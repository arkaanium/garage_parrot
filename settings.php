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
            <p class="text-muted text-left"><a href="gestion">Accueil</a> / Paramètres du site</p>
            <hr>
            <div class="row ">
                <div class="col-md-3 custom-spacing text-center">
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
                    <div class="row">
                        <div class="col-md-5">
                            <h5 class="d-flex">Services</h5>
                            <br>
                            <div class="mb-3">
                                <label for="message" class="form-label">Réparations</label>
                                <textarea class="form-control" id="message" rows="6" placeholder="Description" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Entretiens</label>
                                <textarea class="form-control" id="message" rows="6" placeholder="Description" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Occasions</label>
                                <textarea class="form-control" id="message" rows="6" placeholder="Description" required></textarea>
                            </div>
                            <br>
                            <div class="text-center">
                                <button type="button" class="btn btn-success">Sauvegarder</button>
                            </div>
                        </div>
                        <div class="col-md">
                            <h5 class="d-flex">Horaires</h5>
                            <br>
                            <table class="table table-sm table-borderless m-auto">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Matin</th>
                                        <th scope="col">Après-midi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Lundi</th>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="nom" required>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="prenom" required>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="nom" required>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="prenom" required>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Fermé
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Mardi</th>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="nom" required>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="prenom" required>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="nom" required>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="prenom" required>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Fermé
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Mercredi</th>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="nom" required>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="prenom" required>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="nom" required>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="prenom" required>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Fermé
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jeudi</th>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="nom" required>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="prenom" required>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="nom" required>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="prenom" required>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Fermé
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Vendredi</th>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="nom" required>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="prenom" required>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="nom" required>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="prenom" required>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Fermé
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Samedi</th>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="nom" required>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="prenom" required>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="nom" required>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="prenom" required>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Fermé
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Dimanche</th>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="nom" required>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="prenom" required>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="nom" required>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" id="prenom" required>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Fermé
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <div class="text-center">
                                <button type="button" class="btn btn-success">Sauvegarder</button>
                            </div>
                        </div>
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