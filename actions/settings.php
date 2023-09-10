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
                
                $updateServices = $bdd->prepare('UPDATE settings SET services=:services, update_date=NOW()');
                $updateServices->execute([
                    'services' => json_encode($services)
                ]);

                header('Location: ../settings?r=servicesUpdated');
            }else{
                header('Location: ../settings');
            }
            break;
        case 'updateSchedule':
            if(isset($_SESSION['id'])){
                $schedule = [
                    'lundi' => [],
                    'mardi' => [],
                    'mercredi' => [],
                    'jeudi' => [],
                    'vendredi' => [],
                    'samedi' => [],
                    'dimanche' => [],
                ];
                if(isset($_POST['lundi_close'])){
                    $schedule['lundi'] = 'close';
                }else{
                    $schedule['lundi'] = [
                        'am' => [$_POST['lundi_am_start'],$_POST['lundi_am_stop']],
                        'pm' => [$_POST['lundi_pm_start'],$_POST['lundi_pm_stop']]
                    ];
                }
                if(isset($_POST['mardi_close'])){
                    $schedule['mardi'] = 'close';
                }else{
                    $schedule['mardi'] = [
                        'am' => [$_POST['mardi_am_start'],$_POST['mardi_am_stop']],
                        'pm' => [$_POST['mardi_pm_start'],$_POST['mardi_pm_stop']]
                    ];
                }
                if(isset($_POST['mercredi_close'])){
                    $schedule['mercredi'] = 'close';
                }else{
                    $schedule['mercredi'] = [
                        'am' => [$_POST['mercredi_am_start'],$_POST['mercredi_am_stop']],
                        'pm' => [$_POST['mercredi_pm_start'],$_POST['mercredi_pm_stop']]
                    ];
                }
                if(isset($_POST['jeudi_close'])){
                    $schedule['jeudi'] = 'close';
                }else{
                    $schedule['jeudi'] = [
                        'am' => [$_POST['jeudi_am_start'],$_POST['jeudi_am_stop']],
                        'pm' => [$_POST['jeudi_pm_start'],$_POST['jeudi_pm_stop']]
                    ];
                }
                if(isset($_POST['vendredi_close'])){
                    $schedule['vendredi'] = 'close';
                }else{
                    $schedule['vendredi'] = [
                        'am' => [$_POST['vendredi_am_start'],$_POST['vendredi_am_stop']],
                        'pm' => [$_POST['vendredi_pm_start'],$_POST['vendredi_pm_stop']]
                    ];
                }
                if(isset($_POST['samedi_close'])){
                    $schedule['samedi'] = 'close';
                }else{
                    $schedule['samedi'] = [
                        'am' => [$_POST['samedi_am_start'],$_POST['samedi_am_stop']],
                        'pm' => [$_POST['samedi_pm_start'],$_POST['samedi_pm_stop']]
                    ];
                }
                if(isset($_POST['dimanche_close'])){
                    $schedule['dimanche'] = 'close';
                }else{
                    $schedule['dimanche'] = [
                        'am' => [$_POST['dimanche_am_start'],$_POST['dimanche_am_stop']],
                        'pm' => [$_POST['dimanche_pm_start'],$_POST['dimanche_pm_stop']]
                    ];
                }
                
                $updateServices = $bdd->prepare('UPDATE settings SET schedule=:schedule, update_date=NOW()');
                $updateServices->execute([
                    'schedule' => json_encode($schedule)
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

