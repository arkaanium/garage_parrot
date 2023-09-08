<?php include('includes/config.php');?>
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
            <div class="row">
                <div class="col-md-8">
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://www.automobile-magazine.fr/asset/cms/13275/config/12460/le-restylage-na-pas-bouleverse-le-temperament-de-cette-citroen-c3-elle-continue-a-privilegier-le-confort-au-dynamisme.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://www.automobile-magazine.fr/asset/cms/13275/config/12460/le-restylage-na-pas-bouleverse-le-temperament-de-cette-citroen-c3-elle-continue-a-privilegier-le-confort-au-dynamisme.jpg" class="d-block w-100" alt="...">
                            </div>
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
                            <h5 class="card-title fw-bolder">CITROËN C3</h5>
                            <br>
                            <p>2021 | 11 568 km | Manuelle | Diesel</p>
                            <h5><u>13 990€</u></h5>
                            <br>
                            <p class="text-muted">Publiée le 25/12/2023</p>
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
                            <p class="text-muted">CITROËN C3</p>
                            <br>
                            <div class="row">
                                <div class="col-md">
                                    <h5>Caractéristiques</h5>
                                    <p><b>Année :</b> 2021</p>
                                    <p><b>Provenance :</b> France</p>
                                    <p><b>Mise en circulation :</b> 14/10/2021</p>
                                    <p><b>Contrôle technique :</b> Non requis</p>
                                    <p><b>Première main :</b> Oui</p>
                                    <p><b>Kilométrage compteur :</b> 11 165 km</p>
                                    <p><b>Energie :</b> Essence</p>
                                    <p><b>Boite de vitesse :</b> Manuelle</p>
                                    <p><b>Couleur :</b> blanc</p>
                                    <p><b>Nombre de portes :</b> 5</p>
                                    <p><b>Nombre de places :</b> 5</p>
                                    <p><b>Longueur :</b> 4 m</p>
                                    <p><b>Volume du coffre :</b> Grand coffre</p>
                                    <br>
                                </div>
                                <div class="col-md">
                                    <h5>Puissance du véhicule</h5>
                                    <p><b>Puissance fiscale :</b> 3 CV</p>
                                    <p><b>Puissance :</b> (DIN) 60 ch</p>
                                    <br>
                                    <h5>Consommation</h5>
                                    <p><b>Norme euro :</b> EURO6</p>
                                    <p><b>Crit'Air :</b> 1</p>
                                    <p><b>Consommation mixte :</b> 5,6L/100 km</p>
                                    <p><b>Emission de CO2 :</b> 122 g/km</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="warranty-pane" role="tabpanel" aria-labelledby="warranty-tab" tabindex="0">
                            <br>    
                            <h5>Garantie</h5>
                            <br>
                            <p><b>Garantie :</b> 12 mois</p>
                        </div>
                        <div class="tab-pane fade" id="options-pane" role="tabpanel" aria-labelledby="options-tab" tabindex="0">
                            <br>
                            <div class="row">
                                <div class="col-md">
                                    <h5>Extérieur et Chassis</h5>
                                    <br>
                                    <h5>Intérieur</h5>
                                    <br>
                                    <h5>Sécurité</h5>
                                    <br>
                                </div>
                                <div class="col-md">
                                    <h5>Autre</h5>
                                    
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
                            <input type="text" class="form-control" id="subject" value="Annonce n°54 - CITROËN C3" required>
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