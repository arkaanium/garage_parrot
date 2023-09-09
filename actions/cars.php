<?php
session_start([
    'cookie_lifetime' => 315360000,
]);

require '../includes/db.php';

if(isset($_SESSION['id']) && isset($_GET['do'])){
    switch ($_GET['do']) {
        case 'new':
            if(isset($_SESSION['id']) && isset($_POST['provenance']) && isset($_POST['marque']) && isset($_POST['modele']) && isset($_POST['annee']) && isset($_POST['prix']) && isset($_POST['km']) && isset($_POST['energie']) && isset($_POST['motorisation']) && isset($_POST['premiere_main']) && isset($_POST['technique']) && isset($_POST['couleur']) && isset($_POST['portes']) && isset($_POST['places']) && isset($_POST['longueur']) && isset($_POST['puissance_fisc']) && isset($_POST['puissance']) && isset($_POST['norme']) && isset($_POST['critair']) && isset($_POST['consommation']) && isset($_POST['emission']) && isset($_POST['garantie']) && isset($_POST['exterieur']) && isset($_POST['interieur']) && isset($_POST['securite']) && isset($_POST['autre'])){
                $general_informations = [
                    "marque" => htmlspecialchars($_POST['marque']),
                    "modele" => htmlspecialchars($_POST['modele']),
                    "provenance" => htmlspecialchars($_POST['provenance']),
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
                    "exterieur" => nl2br(htmlspecialchars($_POST['exterieur'])),
                    "interieur" => nl2br(htmlspecialchars($_POST['interieur'])),
                    "securite" => nl2br(htmlspecialchars($_POST['securite'])),
                    "autre" => nl2br(htmlspecialchars($_POST['autre']))
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

                $getID = $bdd->query('SELECT id FROM cars ORDER BY id DESC LIMIT 1');
                $ID = $getID->fetch();

                header('Location: ../addCar?id='.$ID['id'].'&step=2');
            }else{
                header('Location: ../gestion');
            }
            break;
        case 'edit':
            if(isset($_SESSION['id']) && isset($_POST['provenance']) && isset($_GET['id']) && isset($_POST['marque']) && isset($_POST['modele']) && isset($_POST['annee']) && isset($_POST['prix']) && isset($_POST['km']) && isset($_POST['energie']) && isset($_POST['motorisation']) && isset($_POST['premiere_main']) && isset($_POST['technique']) && isset($_POST['couleur']) && isset($_POST['portes']) && isset($_POST['places']) && isset($_POST['longueur']) && isset($_POST['puissance_fisc']) && isset($_POST['puissance']) && isset($_POST['norme']) && isset($_POST['critair']) && isset($_POST['consommation']) && isset($_POST['emission']) && isset($_POST['garantie']) && isset($_POST['exterieur']) && isset($_POST['interieur']) && isset($_POST['securite']) && isset($_POST['autre'])){
                $general_informations = [
                    "marque" => htmlspecialchars($_POST['marque']),
                    "modele" => htmlspecialchars($_POST['modele']),
                    "provenance" => htmlspecialchars($_POST['provenance']),
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
                    "exterieur" => nl2br(htmlspecialchars($_POST['exterieur'])),
                    "interieur" => nl2br(htmlspecialchars($_POST['interieur'])),
                    "securite" => nl2br(htmlspecialchars($_POST['securite'])),
                    "autre" => nl2br(htmlspecialchars($_POST['autre']))
                ];
                
                $editCar = $bdd->prepare('UPDATE cars SET author=:author, general_informations=:general_informations, vehicle_power=:vehicle_power, consumption=:consumption, warranty=:warranty, options=:options, year=:year, price=:price, kilometers=:kilometers WHERE id=:id');
                $editCar->execute([
                    'author' => $_SESSION['name'],
                    'general_informations' => json_encode($general_informations),
                    'vehicle_power' => json_encode($vehicle_power),
                    'consumption' => json_encode($consumption),
                    'warranty' => htmlspecialchars($_POST['garantie']),
                    'options' => json_encode($options),
                    'year' => htmlspecialchars($_POST['annee']),
                    'price' => htmlspecialchars($_POST['prix']),
                    'kilometers' => htmlspecialchars($_POST['km']),
                    'id' => htmlspecialchars($_GET['id'])
                ]);

                header('Location: ../cars?r=edited');
            }else{
                header('Location: ../gestion');
            }
            break;
        case 'addImages':
            if(isset($_FILES['picture_1']) && isset($_GET['id'])){
                foreach (range(1, 10) as $i) {
                    var_dump($_FILES['picture_'.$i]);
                    $img_size = $_FILES['picture_'.$i]['size'];
                    $error = $_FILES['picture_'.$i]['error'];
                    if($_FILES['picture_'.$i]['error'] != 4 && ($_FILES['picture_'.$i]['size'] != 0)){
                        $img_name = $_FILES['picture_'.$i]['name'];
                        $tmp_name = $_FILES['picture_'.$i]['tmp_name'];

                        if($error === 0){
                            if($img_size > 1000000) {
                                header('Location: ../addCar?id='.htmlspecialchars($_GET['id']).'&step=2&r=too_large&image='.$i);
                            }else{
                                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                                $img_ex_lc = strtolower($img_ex);

                                $allowed_exs = array("jpg", "jpeg", "png");

                                if(in_array($img_ex_lc, $allowed_exs)) {
                                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                                    $img_upload_path = '../img/uploads/'.$new_img_name;
                                    move_uploaded_file($tmp_name, $img_upload_path);

                                    $insertImage = $bdd->prepare('INSERT INTO images (name, annonce_id, author, upload_date) VALUES (:name, :annonce_id, :author, NOW())');
                                    $insertImage->execute([
                                        'name' => $new_img_name,
                                        'annonce_id' => htmlspecialchars($_GET['id']),
                                        'author' => $_SESSION['name']
                                    ]);
                                    header('Location: ../cars?r=published');
                                }else{
                                    header('Location: ../addCar?id='.htmlspecialchars($_GET['id']).'&step=2&r=invalid_type&image='.$i);
                                }
                            }
                        }else{
                            header('Location: ../addCar?id='.htmlspecialchars($_GET['id']).'&step=2&r=error&image='.$i);
                        }
                    }
                }
            }else{
                header('Location: ../gestion');
            }
            break;
        case 'delete':
            if(isset($_SESSION['id']) && isset($_GET['id'])){
                $delCar = $bdd->prepare('DELETE FROM cars WHERE id=:id');
                $delCar->execute([ 'id' => htmlspecialchars($_GET['id']) ]);

                $getImages = $bdd->prepare('SELECT name FROM images WHERE annonce_id=:id');
                $getImages->execute([ 'id' => htmlspecialchars($_GET['id']) ]);
                while($image = $getImages->fetch()){
                    unlink('../img/uploads/'.$image['name']);
                }

                $deleteImages = $bdd->prepare('DELETE FROM images WHERE annonce_id=:id');
                $deleteImages->execute([ 'id' => htmlspecialchars($_GET['id']) ]);

                header('Location: ../cars?r=deleted');
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

