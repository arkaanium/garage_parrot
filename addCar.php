<?php
include('includes/config.php');
if(!isset($_GET['step'])){
    header('Location: addCar?step=1');
    exit();
}
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
            <p class="text-muted text-left"><a href="gestion">Accueil</a> / <a href="cars">Annonces</a> / Nouvelle annonce</p>
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
                <?php if(isset($_GET['step']) && $_GET['step'] == 1){?>
                <div class="col-md verticalSeperatorLeft">
                    <form action="actions/cars.php?do=new" method="post">
                        <div class="row">
                            <div class="col-md">
                                <h5 class="d-flex text-left">Informations générales</h5><br>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Marque</span>
                                    <input type="text" class="form-control" name="marque" placeholder="Citroën" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Modèle</span>
                                    <input type="text" class="form-control" name="modele" placeholder="C3" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Année</span>
                                    <input type="number" class="form-control" name="annee" placeholder="2021" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Prix</span>
                                    <input type="text" class="form-control" name="prix" required>
                                    <span class="input-group-text" id="basic-addon1">€</span>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Kilométrage</span>
                                    <input type="number" class="form-control" name="km" required>
                                    <span class="input-group-text" id="basic-addon1">km</span>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Energie</span>
                                    <input type="text" class="form-control" name="energie" placeholder="Essence" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Boite de vitesse</span>
                                    <input type="text" class="form-control" name="motorisation" placeholder="Automatique" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Première main</span>
                                    <select class="form-select" name="premiere_main" aria-label="Default select example">
                                        <option selected value="yes">Oui</option>
                                        <option value="no">Non</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Contrôle technique</span>
                                    <select class="form-select" name="technique" aria-label="Default select example">
                                        <option selected value="yes">Requis</option>
                                        <option value="no">Non requis</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Couleur</span>
                                    <input type="text" class="form-control" name="couleur" placeholder="Blanc" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Nombre de portes</span>
                                    <input type="number" class="form-control" name="portes" placeholder="5" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Nombre de places</span>
                                    <input type="number" class="form-control" name="places" placeholder="5" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Longueur</span>
                                    <input type="number" class="form-control" name="longueur" placeholder="5" required>
                                    <span class="input-group-text" id="basic-addon1">m</span>
                                </div>
                            </div>
                            <div class="col-md">
                                <h5 class="d-flex text-left">Puissance du véhicule</h5><br>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Puissance fiscale</span>
                                    <input type="text" class="form-control" name="puissance_fisc" placeholder="3" required>
                                    <span class="input-group-text" id="basic-addon1">CV</span>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Puissance (DIN)</span>
                                    <input type="text" class="form-control" name="puissance" placeholder="60" required>
                                    <span class="input-group-text" id="basic-addon1">ch</span>
                                </div>
                                <br>
                                <h5 class="d-flex text-left">Consommation</h5><br>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Norme euro</span>
                                    <input type="text" class="form-control" name="norme" placeholder="EURO6" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Crit'Air</span>
                                    <input type="text" class="form-control" name="critair" placeholder="1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Consommation mixte</span>
                                    <input type="number" class="form-control" name="consommation" placeholder="5,6" required>
                                    <span class="input-group-text" id="basic-addon1">L/100 km</span>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Emission de CO2</span>
                                    <input type="number" class="form-control" name="emission" placeholder="122" required>
                                    <span class="input-group-text" id="basic-addon1">g/km</span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="d-flex">Garantie</h5><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Garantie</span>
                            <input type="text" class="form-control" name="garantie" placeholder="12" required>
                            <span class="input-group-text" id="basic-addon1">mois</span>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md">
                                <h5 class="d-flex text-left">Extérieur et Chassis</h5><br>
                                <textarea class="form-control" name="exterieur" rows="15" placeholder="Listez les options une par une" required></textarea>
                                <br>
                                <h5 class="d-flex text-left">Intérieur</h5><br>
                                <textarea class="form-control" name="interieur" rows="15" placeholder="Listez les options une par une" required></textarea>
                                <br>
                                <h5 class="d-flex text-left">Sécurité</h5><br>
                                <textarea class="form-control" name="securite" rows="15" placeholder="Listez les options une par une" required></textarea>
                                <br>
                            </div>
                            <div class="col-md">
                                <h5 class="d-flex text-left">Autre</h5><br>
                                <textarea class="form-control" name="autre" rows="15" placeholder="Listez les options une par une" required></textarea>
                                <br>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-success">Etape suivante</a>
                    </form>
                </div>
                <?php }else if(isset($_GET['step']) && $_GET['step'] == 2){?>
                <div class="col-md verticalSeperatorLeft">
                    <form>
                        <div class="row">
                            <div class="col-md">
                                <h5 class="d-flex">Photos (10 maximum)</h5>
                                <input type="file" class="form-control">
                                <input type="file" class="form-control">
                                <input type="file" class="form-control">
                                <input type="file" class="form-control">
                                <input type="file" class="form-control">
                                <input type="file" class="form-control">
                                <input type="file" class="form-control">
                                <input type="file" class="form-control">
                                <input type="file" class="form-control">
                                <input type="file" class="form-control">
                                <br>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <a href="addCar" class="btn btn-success">Publier</a>
                </div>
                <?php }?>
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