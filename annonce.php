<?php
if(!isset($_GET['id'])){
    header('Location: occasions');
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
        <link rel="stylesheet" href="css/occasions.css">
        <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="assets/fontawesome/css/solid.css" rel="stylesheet">
    </head>
    <body>
        <?php include('includes/menu.php');?>
        <div class="container">
            <br>
            <a href="occasions" class="btn btn-sm btn-outline-dark"><i class="fas fa-left-long"></i> Retour</a>
            <br>
            <br>
            <?php
            $getCarInfo = $bdd->prepare('SELECT id, general_informations, vehicle_power, consumption, warranty, options, year, price, kilometers, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date FROM cars WHERE id=:id');
            $getCarInfo->execute([ 'id' => htmlspecialchars($_GET['id']) ]);
            $carInfo = $getCarInfo->fetch();

            $generalInformations = json_decode($carInfo['general_informations']);
            $vehiclePower = json_decode($carInfo['vehicle_power']);
            $options = json_decode($carInfo['options']);
            $consumption = json_decode($carInfo['consumption']);
            ?>
            <div class="row">
                <div class="col-md-8">
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            $getImages = $bdd->prepare('SELECT name FROM images WHERE annonce_id=:id');
                            $getImages->execute([ 'id' => htmlspecialchars($carInfo['id']) ]);
                            while($image = $getImages->fetch()){
                            ?>
                            <div class="carousel-item a-item active">
                                <img src="img/uploads/<?=$image['name'];?>" class="d-block w-100 a-img" alt="...">
                            </div>
                            <?php } ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <br>
                </div>
                <div class="col-md">
                    <div class="card text-center" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                        <div class="card-body">
                            <h5 class="card-title fw-bolder"><?=strtoupper($generalInformations->marque);?> <?=strtoupper($generalInformations->modele);?></h5>
                            <br>
                            <p><?=$carInfo['year'];?> | <?=number_format($carInfo['kilometers'],'0',' ',' ');?> km | <?=ucfirst(strtolower($generalInformations->motorisation));?> | <?=ucfirst(strtolower($generalInformations->energie));?></p>
                            <h5><u><?=number_format($carInfo['price'],'0',' ',' ');?>€</u></h5>
                            <br>
                            <p class="text-muted">Publiée le <?=$carInfo['creation_date'];?></p>
                            <button class="btn btn-darkred" onclick="scrollToForm()">Nous contacter</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-8">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link annonceTabColor active" id="home-tab" data-bs-toggle="tab" data-bs-target="#general-informations-pane" type="button" role="tab" aria-controls="general-informations-pane" aria-selected="true">Informations générales</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link annonceTabColor" id="warranty-tab" data-bs-toggle="tab" data-bs-target="#warranty-pane" type="button" role="tab" aria-controls="warranty-pane" aria-selected="false">Garantie</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link annonceTabColor" id="options-tab" data-bs-toggle="tab" data-bs-target="#options-pane" type="button" role="tab" aria-controls="options-pane" aria-selected="false">Équipements & options</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="general-informations-pane" role="tabpanel" aria-labelledby="general-informations-tab" tabindex="0">
                            <br>    
                            <h5>Informations générales</h5>
                            <p class="text-muted"><?=strtoupper($generalInformations->marque);?> <?=strtoupper($generalInformations->modele);?></p>
                            <br>
                            <?php
                            switch ($generalInformations->technique) {
                                case 'yes':
                                    $technique = "Oui";
                                    break;
                                case 'no':
                                    $technique = "Non";
                                    break;
                            }
                            switch ($generalInformations->premiere_main) {
                                case 'yes':
                                    $premiere_main = "Oui";
                                    break;
                                case 'no':
                                    $premiere_main = "Non";
                                    break;
                            }
                            ?>
                            <div class="row">
                                <div class="col-md">
                                    <h5>Caractéristiques</h5>
                                    <p><b>Année :</b> <?=$carInfo['year'];?></p>
                                    <p><b>Provenance :</b> <?=ucfirst(strtolower($generalInformations->provenance));?></p>
                                    <p><b>Mise en circulation :</b> <?=$carInfo['year'];?></p>
                                    <p><b>Contrôle technique :</b> <?=$technique;?></p>
                                    <p><b>Première main :</b> <?=$premiere_main;?></p>
                                    <p><b>Kilométrage compteur :</b> <?=number_format($carInfo['kilometers'],'0',' ',' ');?> km</p>
                                    <p><b>Energie :</b> <?=ucfirst(strtolower($generalInformations->energie));?></p>
                                    <p><b>Boite de vitesse :</b> <?=ucfirst(strtolower($generalInformations->motorisation));?></p>
                                    <p><b>Couleur :</b> <?=ucfirst(strtolower($generalInformations->couleur));?></p>
                                    <p><b>Nombre de portes :</b> <?=$generalInformations->portes;?></p>
                                    <p><b>Nombre de places :</b> <?=$generalInformations->places;?></p>
                                    <p><b>Longueur :</b> <?=$generalInformations->longueur;?> m</p>
                                    <br>
                                </div>
                                <div class="col-md">
                                    <h5>Puissance du véhicule</h5>
                                    <p><b>Puissance fiscale :</b> <?=$vehiclePower->puissance_fisc;?> CV</p>
                                    <p><b>Puissance :</b> (DIN) <?=$vehiclePower->puissance;?> ch</p>
                                    <br>
                                    <h5>Consommation</h5>
                                    <p><b>Norme euro :</b> <?=strtoupper($consumption->norme);?></p>
                                    <p><b>Crit'Air :</b> <?=$consumption->critair;?></p>
                                    <p><b>Consommation mixte :</b> <?=$consumption->consommation;?>L/100 km</p>
                                    <p><b>Emission de CO2 :</b> <?=$consumption->emission;?> g/km</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="warranty-pane" role="tabpanel" aria-labelledby="warranty-tab" tabindex="0">
                            <br>    
                            <h5>Garantie</h5>
                            <br>
                            <p><b>Garantie :</b> <?=$carInfo['warranty'];?> mois</p>
                        </div>
                        <div class="tab-pane fade" id="options-pane" role="tabpanel" aria-labelledby="options-tab" tabindex="0">
                            <br>
                            <div class="row">
                                <div class="col-md">
                                    <h5>Extérieur et Chassis</h5>
                                    <?=$options->exterieur;?>
                                    <br>
                                    <br>
                                    <h5>Intérieur</h5>
                                    <?=$options->interieur;?>
                                    <br>
                                    <br>
                                    <h5>Sécurité</h5>
                                    <?=$options->securite;?>
                                    <br>
                                    <br>
                                </div>
                                <div class="col-md">
                                    <h5>Autre</h5>
                                    <?=$options->autre;?>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h3 id="contactus"><i class="fas fa-envelope"></i> Envoyer un message</h3>
                    <br>
                    <form>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" required>
                                </div>
                                <div class="col">
                                    <label for="prenom" class="form-label">Prénom</label>
                                    <input type="text" class="form-control" id="prenom" placeholder="Entrez votre prénom" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">Numéro de téléphone</label>
                            <input type="tel" class="form-control" id="telephone" placeholder="Entrez votre numéro de téléphone" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse e-mail</label>
                            <input type="email" class="form-control" id="email" placeholder="Entrez votre adresse e-mail" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Sujet</label>
                            <input type="text" class="form-control" id="subject" value="Annonce n°<?=$carInfo['id'];?> - <?=strtoupper($generalInformations->marque);?> <?=strtoupper($generalInformations->modele);?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="6" placeholder="Entrez votre message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-darkred">Envoyer</button>
                    </form>
                </div>
                <div class="col-md">
                </div>
            </div>
        </div>
        <br>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/annonce.js"></script>
        <?php include('includes/footer.php');?>
    </body>
</html>