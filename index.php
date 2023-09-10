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
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item c-item active">
                    <img src="img/c1.jpg" class="d-block w-100 c-img" alt="...">
                    <div class="carousel-caption top-0 mt-4">
                        <p class="text-uppercase fs-3 mt-5">First slide label</p>
                        <h1 class="display-1 fw-bolder text-capitalize">Réparation automobile.</h1>
                    </div>
                </div>
                <div class="carousel-item c-item">
                    <img src="https://images.pexels.com/photos/3807386/pexels-photo-3807386.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100 c-img" alt="...">
                    <div class="carousel-caption top-0 mt-4">
                        <p class="text-uppercase fs-3 mt-5">First slide label</p>
                        <h1 class="display-1 fw-bolder text-capitalize">Entretiens.</h1>
                    </div>
                </div>
                <div class="carousel-item c-item">
                    <img src="https://images.pexels.com/photos/7144226/pexels-photo-7144226.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100 c-img" alt="...">
                    <div class="carousel-caption top-0 mt-4">
                        <p class="text-uppercase fs-3 mt-5">Occasions</p>
                        <h1 class="display-1 fw-bolder text-capitalize">Occasions.</h1>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="services">
            <br>
            <h1 class="display-5 fw-bolder mb-5">Nos Services</h5>
            <br>
            <?php
            $getServices = $bdd->query('SELECT services FROM settings');
            $services = json_decode($getServices->fetch()['services']);
            ?>
            <div class="row services-row">
                <div class="col-md indexCustomCol">
                    <p><i class="fas fa-screwdriver-wrench fa-5x"></i></p>
                    <h2 class=" fw-bolder">Réparations</h2>
                    <br>
                    <p><?=$services->repairs;?></p>
                </div>
                <div class="col-md indexCustomCol">
                    <p><i class="fas fa-gear fa-5x"></i></p>
                    <h2 class=" fw-bolder">Entretiens</h2>
                    <br>
                    <p><?=$services->maintenance;?></p>
                </div>
                <br>
                <div class="col-md indexCustomCol">
                    <p><i class="fas fa-car fa-5x"></i></p>
                    <h2 class=" fw-bolder">Occasions</h2>
                    <br>
                    <p><?=$services->occasions;?></p>
                </div>
            </div>
        </div>
        <div class="reviewsPreview">
            <br>
            <h1 class="display-5 fw-bolder mb-5">Ils nous ont fait confiance</h5>
            <br>
            <?php
            $getLatestReviews = $bdd->query('SELECT rate, subject, comment, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date FROM reviews ORDER BY id DESC LIMIT 4');
            ?>
            <div class="row reviewsPreview-row text-dark">
                <?php $i=0; while($review = $getLatestReviews->fetch()){?>
                    <div class="col-md-3 indexCustomCol <?php if($i != 3){?>verticalSeperatorRight<?php } ?>">
                        <?=getStars($review['rate']);?> <b><?=$review['subject'];?>.</b><br>
                        <span class="text-muted">Commenté le <?=$review['creation_date'];?></span><br>
                        <p><?=$review['comment'];?>.</p>
                    </div>
                <?php $i++; } ?>
            </div>
            <a href="reviews" class="btn btn-darkred">Afficher plus</a>
            <br>
            <br>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <?php include('includes/footer.php');?>
    </body>
</html>