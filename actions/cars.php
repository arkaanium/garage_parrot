<?php
session_start([
    'cookie_lifetime' => 315360000,
]);

require '../includes/db.php';

if(isset($_SESSION['id']) && isset($_GET['do'])){
    switch ($_GET['do']) {
        case 'new':
            if(isset($_SESSION['id']) && isset($_POST['marque']) && isset($_POST['modele']) && isset($_POST['annee']) && isset($_POST['prix']) && isset($_POST['km']) && isset($_POST['energie']) && isset($_POST['motorisation']) && isset($_POST['premiere_main']) && isset($_POST['technique']) && isset($_POST['couleur']) && isset($_POST['portes']) && isset($_POST['places']) && isset($_POST['longueur']) && isset($_POST['puissance_fisc']) && isset($_POST['puissance']) && isset($_POST['norme']) && isset($_POST['critair']) && isset($_POST['consommation']) && isset($_POST['emission']) && isset($_POST['garantie']) && isset($_POST['exterieur']) && isset($_POST['interieur']) && isset($_POST['securite']) && isset($_POST['autre'])){
                $general_informations = [
                    "marque" => htmlspecialchars($_POST['marque']),
                    "modele" => htmlspecialchars($_POST['modele']),
                    "energie" => htmlspecialchars($_POST['energie']),
                    "motorisation" => htmlspecialchars($_POST['motorisation']),
                    "premiere_main" => htmlspecialchars($_POST['premiere_main']),
                    "technique" => htmlspecialchars($_POST['technique']),
                    "couleur" => htmlspecialchars($_POST['couleur']),
                    "portes" => htmlspecialchars($_POST['portes']),
                    "places" => htmlspecialchars($_POST['places']),
                    "longueur" => htmlspecialchars($_POST['longueur'])
                ];
                $vehicle_power = [
                    "puissance_fisc" => htmlspecialchars($_POST['puissance_fisc']),
                    "puissance" => htmlspecialchars($_POST['puissance'])
                ];
                $consumption = [
                    "norme" => htmlspecialchars($_POST['norme']),
                    "critair" => htmlspecialchars($_POST['critair']),
                    "consommation" => htmlspecialchars($_POST['consommation']),
                    "emission" => htmlspecialchars($_POST['emission'])
                ];
                $options = [
                    "exterieur" => htmlspecialchars($_POST['exterieur']),
                    "interieur" => htmlspecialchars($_POST['interieur']),
                    "securite" => htmlspecialchars($_POST['securite']),
                    "autre" => htmlspecialchars($_POST['autre'])
                ];
                
                $newCar = $bdd->prepare('INSERT INTO cars (author, general_informations, vehicle_power, consumption, warranty, options, year, price, kilometers, creation_date) VALUES (:author, :general_informations, :vehicle_power, :consumption, :warranty, :options, :year, :price, :kilometers, NOW())');
                $newCar->execute([
                    'author' => $_SESSION['name'],
                    'general_informations' => json_encode($general_informations),
                    'vehicle_power' => json_encode($vehicle_power),
                    'consumption' => json_encode($consumption),
                    'warranty' => htmlspecialchars($_POST['garantie']),
                    'options' => json_encode($options),
                    'year' => htmlspecialchars($_POST['annee']),
                    'price' => htmlspecialchars($_POST['prix']),
                    'kilometers' => htmlspecialchars($_POST['km'])
                ]);
            }else{
                header('Location: ../gestion');
            }
            break;
        
        default:
            header('Location: ../gestion');
            break;
    }
}else{
    header('Location: ../index');
}

