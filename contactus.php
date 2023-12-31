<?php include('includes/config.php');?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Page de contact du garage v-parrot">
        <meta name="keywords" content="v-parrot, garage, vincent, parrot, reparations, entretiens, occasions, vehicules">
        <meta name="revisit-After" content="15 days">
        <meta name="robots" content="index,follow">
        <meta name="rating" content="general">
        <title><?=$site_name;?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="<?=$logo;?>">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/occasions.css">
        <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="assets/fontawesome/css/solid.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/leaflet/leaflet.css" />
        <script src="assets/leaflet/leaflet.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body>
    
        <?php include('includes/menu.php');?>
        <div class="container">
            <br>
            <div class="row">
                <div class="col-md" style="border-right: var(--bs-border-width) solid rgba(199, 200, 201, .8);">
                    <h1 class="display-6 fw-bolder"><i class="fas fa-map-location-dot"></i> Où sommes-nous</h1>
                    <br>
                    <div id="map" style="height: 400px;"></div>
                    <br>
                    <div class="row">
                        <div class="col-md">
                            <h3>Garage V.Parrot</h3>
                            <p>14 Rue Jean Claudeville, 25896 Bordeaux</p>
                        </div>
                        <div class="col-md">
                            <div class="row">
                                <div class="col text-end">
                                    <b><i class="fa-solid fa-phone"></i> Téléphone :</b><br>
                                    <b><i class="fa-solid fa-mobile"></i> Portable :</b>
                                </div>
                                <div class="col">
                                    <span>0254248956</span><br>
                                    <span>0654248956</span><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <h1 class="display-6 fw-bolder"><i class="fas fa-envelope"></i> Contactez-nous</h1>
                    <br>
                    <?php if(isset($_GET['r']) && $_GET['r'] == 'messageSent'){?><div class="alert alert-success" role="alert">Message envoyé, vous serez recontacté dans les plus brefs délais</div><?php }?>
                    <?php if(isset($_GET['r']) && $_GET['r'] == 'incompleteFields'){?><div class="alert alert-danger" role="alert">Champs incomplets</div><?php }?>
                    <form action="actions/messages.php?do=sendMessage&return=contactus" method="post" id="contactForm">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" name="nom" placeholder="Entrez votre nom" required>
                                </div>
                                <div class="col">
                                    <label for="prenom" class="form-label">Prénom</label>
                                    <input type="text" class="form-control" name="prenom" placeholder="Entrez votre prénom" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">Numéro de téléphone</label>
                            <input type="tel" class="form-control" name="telephone" placeholder="Entrez votre numéro de téléphone" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse e-mail</label>
                            <input type="email" class="form-control" name="email" placeholder="Entrez votre adresse e-mail" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Sujet</label>
                            <input type="text" class="form-control" name="subject" value="Demande de renseignement" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" name="message" rows="6" placeholder="Entrez votre message" required></textarea>
                        </div>
                        <button type="submit" id="submitBtn" data-sitekey="6Lep-hkoAAAAAHwYItfXA4ddsuBJLTAo15ZPwet4" data-callback='onSubmit' data-action='submit' class="btn btn-darkred g-recaptcha">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <script>
            // Initialisez la carte avec des coordonnées et un niveau de zoom
            var map = L.map('map').setView([44.87318456091879, -0.5852668633185883], 15);

            // Ajoutez une couche de carte OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Ajoutez un marqueur pour votre magasin
            var marker = L.marker([44.87318456091879, -0.5852668633185883]).addTo(map);
            marker.bindPopup("Garage V.Parrot").openPopup();
        </script>
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/contactus.js"></script>
        <?php include('includes/footer.php');?>
    </body>
</html>