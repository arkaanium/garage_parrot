<?php
session_start([
    'cookie_lifetime' => 315360000,
]);

if(!isset($_SESSION['id'])){
    header('Location: ../login');
    exit();
}

include('includes/config.php');
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
            <p class="text-muted text-left"><a href="gestion">Accueil</a> / Avis</p>
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Prénom/nom</th>
                                <th scope="col">Commentaire</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="badge text-bg-danger"><i class="fa-solid fa-trash text-light"></i></span></td>
                                <td>Vincent Parrot</td>
                                <td><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i> 6 mois d utilisation et la manette de prends plus la charge et ne s allume plus malgré une utilisation conforme et pas très régulière, j espère que la garantie fera son travail mais déçue.<br><span class="text-muted">Ajouté le 26/01/2023</span></td>
                            </tr>
                            <tr>
                                <td><span class="badge text-bg-danger"><i class="fa-solid fa-trash text-light"></i></span></td>
                                <td>Vincent Parrot</td>
                                <td><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i> 6 mois d utilisation et la manette de prends plus la charge et ne s allume plus malgré une utilisation conforme et pas très régulière, j espère que la garantie fera son travail mais déçue.<br><span class="text-muted">Ajouté le 26/01/2023</span></td>
                            </tr>
                            <tr>
                                <td><span class="badge text-bg-danger"><i class="fa-solid fa-trash text-light"></i></span></td>
                                <td>Vincent Parrot</td>
                                <td><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i> 6 mois d utilisation et la manette de prends plus la charge et ne s allume plus malgré une utilisation conforme et pas très régulière, j espère que la garantie fera son travail mais déçue.<br><span class="text-muted">Ajouté le 26/01/2023</span></td>
                            </tr>
                            <tr>
                                <td><span class="badge text-bg-danger"><i class="fa-solid fa-trash text-light"></i></span></td>
                                <td>Vincent Parrot</td>
                                <td><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i> 6 mois d utilisation et la manette de prends plus la charge et ne s allume plus malgré une utilisation conforme et pas très régulière, j espère que la garantie fera son travail mais déçue.<br><span class="text-muted">Ajouté le 26/01/2023</span></td>
                            </tr>
                            <tr>
                                <td><span class="badge text-bg-danger"><i class="fa-solid fa-trash text-light"></i></span></td>
                                <td>Vincent Parrot</td>
                                <td><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i> 6 mois d utilisation et la manette de prends plus la charge et ne s allume plus malgré une utilisation conforme et pas très régulière, j espère que la garantie fera son travail mais déçue.<br><span class="text-muted">Ajouté le 26/01/2023</span></td>
                            </tr>
                            <tr>
                                <td><span class="badge text-bg-danger"><i class="fa-solid fa-trash text-light"></i></span></td>
                                <td>Vincent Parrot</td>
                                <td><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i> 6 mois d utilisation et la manette de prends plus la charge et ne s allume plus malgré une utilisation conforme et pas très régulière, j espère que la garantie fera son travail mais déçue.<br><span class="text-muted">Ajouté le 26/01/2023</span></td>
                            </tr>
                            <tr>
                                <td><span class="badge text-bg-danger"><i class="fa-solid fa-trash text-light"></i></span></td>
                                <td>Vincent Parrot</td>
                                <td><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i> 6 mois d utilisation et la manette de prends plus la charge et ne s allume plus malgré une utilisation conforme et pas très régulière, j espère que la garantie fera son travail mais déçue.<br><span class="text-muted">Ajouté le 26/01/2023</span></td>
                            </tr>
                            <tr>
                                <td><span class="badge text-bg-danger"><i class="fa-solid fa-trash text-light"></i></span></td>
                                <td>Vincent Parrot</td>
                                <td><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i> 6 mois d utilisation et la manette de prends plus la charge et ne s allume plus malgré une utilisation conforme et pas très régulière, j espère que la garantie fera son travail mais déçue.<br><span class="text-muted">Ajouté le 26/01/2023</span></td>
                            </tr>
                            <tr>
                                <td><span class="badge text-bg-danger"><i class="fa-solid fa-trash text-light"></i></span></td>
                                <td>Vincent Parrot</td>
                                <td><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i> 6 mois d utilisation et la manette de prends plus la charge et ne s allume plus malgré une utilisation conforme et pas très régulière, j espère que la garantie fera son travail mais déçue.<br><span class="text-muted">Ajouté le 26/01/2023</span></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-sm btn-success"><i class="fa-solid fa-square-plus"></i> Ajouter</button>
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