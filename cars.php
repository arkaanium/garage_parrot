<?php 
session_start([
    'cookie_lifetime' => 315360000,
]);

if(!isset($_SESSION['id'])){
    header('Location: login');
    exit();
}

require('includes/config.php');
require('includes/db.php');

?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?=$site_name;?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="<?=$logo;?>">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/gestion.css">
        <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="assets/fontawesome/css/solid.css" rel="stylesheet">
    </head>
    <body>
        <?php include('includes/adminNavBar.php');?>
        <br>
        <div class="container ">
            <h5 class="display-6 d-flex">Panneau d'administration</h5>
            <p class="text-muted text-left"><a href="gestion">Accueil</a> / Annonces</p>
            <hr>
            <div class="row text-center">
                <div class="col-md-3 custom-spacing">
                    <div class="card">
                        <div class="card-body">
                            <h1><i class="fa-solid fa-circle-user"></i></h1>
                            <h5 class="card-title">Vincent Parrot</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Administrateur</h6>
                            <hr>
                            <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-right-from-bracket"></i></button> <button type="button" class="btn btn-sm btn-secondary"><i class="fa-solid fa-lock"></i> Modifier mot de passe</button>
                        </div>
                    </div>
                </div>
                <div class="col-md verticalSeperatorLeft">
                    <br>
                    <?php
                    $getCarList = $bdd->query('SELECT id, author, general_informations, price, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date FROM cars ORDER BY id DESC');
                    ?>
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">N°</th>
                                <th scope="col">Véhicule</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Date d'ajout</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($carList = $getCarList->fetch()){
                                $generalInformations = json_decode($carList['general_informations']);
                            ?>
                                <tr>
                                    <td><span class="badge text-bg-danger"><i class="fa-solid fa-trash text-light"></i></span> <a href="addCar?id=<?=$carList['id'];?>&step=2&type=edit"><span class="badge text-bg-success"><i class="fa-solid fa-camera"></i></span></a> <a href="editCar?id=<?=$carList['id'];?>"><span class="badge text-bg-warning"><i class="fa-solid fa-pen text-light"></i></span></a></td>
                                    <td><a href="#"><?=$carList['id'];?></a></td>
                                    <td><?=$generalInformations->marque;?> <?=$generalInformations->modele;?></td>
                                    <td><b><?=number_format($carList['price'],'0',' ',' ');?> €</b></td>
                                    <td><?=$carList['creation_date'];?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a href="addCar" class="btn btn-sm btn-success"><i class="fa-solid fa-square-plus"></i> Publier une annonce</a>
                </div>
            </div>
            <hr>
            <p class="text-muted d-flex">Garage V.Parrot &copy; Copyright 2023</p>
        </div>
        <br>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/annonce.js"></script>
    </body>
</html>