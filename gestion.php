<?php
require('includes/refresh.php');

require('includes/config.php');
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
            <p class="text-muted text-left">Accueil</p>
            <hr>
            <div class="row text-center">
                <div class="col-md-3 custom-spacing">
                    <?php include('includes/userInfosCard.php');?>
                </div>
                <div class="col-md verticalSeperatorLeft">
                    <?php include('includes/passwordUpdateMessages.php');?>
                    <div class="row">
                        <?php if($_SESSION['type'] == 'admin'){?>
                        <div class="col-md-3 custom-spacing">
                            <div class="card">
                                <div class="card-header">
                                    <h1><i class="fa-solid fa-user"></i></h1>
                                </div>
                                <div class="card-body">
                                    <a href="users"><h5>Utilisateurs</h5></a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-md-3 custom-spacing">
                            <div class="card">
                                <div class="card-header">
                                    <h1><i class="fa-solid fa-star"></i></h1>
                                </div>
                                <div class="card-body">
                                    <a href="comments"><h5>Avis</h5></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 custom-spacing">
                            <div class="card">
                                <div class="card-header">
                                    <h1><i class="fa-solid fa-car"></i></h1>
                                </div>
                                <div class="card-body">
                                    <a href="cars"><h5>Annonces</h5></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 custom-spacing">
                            <div class="card">
                                <div class="card-header">
                                    <h1><i class="fa-solid fa-envelope"></i></h1>
                                </div>
                                <div class="card-body">
                                    <a href="messages"><h5>Messagerie</h5></a>
                                </div>
                            </div>
                        </div>
                        <?php if($_SESSION['type'] == 'admin'){?>
                        <div class="col-md-3 custom-spacing">
                            <div class="card">
                                <div class="card-header">
                                    <h1><i class="fa-solid fa-gear"></i></h1>
                                </div>
                                <div class="card-body">
                                    <a href="settings"><h5>Paramètres</h5></a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
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