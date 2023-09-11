<?php
require('includes/config.php');
require('includes/db.php');
require('functions/comments.function.php');
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
        <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="assets/fontawesome/css/solid.css" rel="stylesheet">
    </head>
    <body>
        <?php include('includes/menu.php');?>
        <div class="container">
            <br>
            <h1 class="text-center">MENTIONS LÉGALES</h1>

            <p>Conformément aux dispositions de la loi n° 2004-575 du 21 juin 2004 pour la confiance en l'économie numérique, il est précisé aux utilisateurs du site Garage V.Parrot l'identité des différents intervenants dans le cadre de sa réalisation et de son suivi.</p>

            <h3>Edition du site</h3>
            <p>
            Le présent site, accessible à l’URL garage.arkaanium.fr (le « Site »), est édité par :

            Teddy HERVIER, résidant 55 Rue des Raizes, 36200 argenton sur creuse, de nationalité Française (France), né(e) le 14/10/2003, 
            </p>

            <h3>Hébergement</h3>

            <p>Le Site est hébergé par la société 1&1 / IONOS, situé 7 Place de la Gare - 57200 Sarreguemines, (contact téléphonique ou email : (+33) 9 70 80 89 11).</p>

            <h3>Directeur de publication</h3>

            <p>Le Directeur de la publication du Site est Teddy HERVIER.</p>

            <h3>Nous contacter</h3>

            <p>Par téléphone : +33656691845
            Par email : arkaniumfr@gmail.com
            Par courrier : 55 Rue des Raizes, 36200 Argenton sur creuse</p>

            <h3>Données personnelles</h3>

            <p>Le traitement de vos données à caractère personnel est régi par notre Charte du respect de la vie privée, disponible depuis la section "Charte de Protection des Données Personnelles", conformément au Règlement Général sur la Protection des Données 2016/679 du 27 avril 2016 («RGPD»).</p>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <?php include('includes/footer.php');?>
    </body>
</html>