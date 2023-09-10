<?php
session_start([
    'cookie_lifetime' => 315360000,
]);

require '../includes/db.php';

if(isset($_SESSION['id']) && isset($_GET['do'])){
    switch ($_GET['do']) {
        case 'updateServices':
            if(isset($_SESSION['id']) && isset($_POST['repairs']) && isset($_POST['maintenance']) && isset($_POST['occasions'])){
                $services = [
                    "repairs" => htmlspecialchars($_POST['repairs']),
                    "maintenance" => htmlspecialchars($_POST['maintenance']),
                    "occasions" => htmlspecialchars($_POST['occasions'])
                ];
                
                $updateServices = $bdd->prepare('UPDATE settings SET services=:services');
                $updateServices->execute([
                    'services' => json_encode($services)
                ]);

                header('Location: ../settings?r=servicesUpdated');
            }else{
                header('Location: ../settings');
            }
            break;
        default:
            header('Location: ../settings');
            break;
    }
}else{
    header('Location: ../index');
}

