<?php

include('../includes/db.php');
include('../functions/catalog.functions.php');

$kmMin = getMinValue('kilometers');
$priceMin = getMinValue('price');
$yearMin = getMinValue('year');
$kmMax = getMaxValue('kilometers');
$priceMax = getMaxValue('price');
$yearMax = getMaxValue('year');

if(isset($_GET['kmMin']) && $_GET['kmMin'] != ""){
    $kmMin = $_GET['kmMin'];
}
if(isset($_GET['kmMax']) && $_GET['kmMax'] != ""){
    $kmMax = $_GET['kmMax'];
}
if(isset($_GET['priceMin']) && $_GET['priceMin'] != ""){
    $priceMin = $_GET['priceMin'];
}
if(isset($_GET['priceMax']) && $_GET['priceMax'] != ""){
    $priceMax = $_GET['priceMax'];
}
if(isset($_GET['yearMin']) && $_GET['yearMin'] != ""){
    $yearMin = $_GET['yearMin'];
}
if(isset($_GET['yearMax']) && $_GET['yearMax'] != ""){
    $yearMax = $_GET['yearMax'];
}

$getCars = $bdd->prepare('SELECT * FROM cars WHERE (kilometers>=:kmMin AND kilometers <=:kmMax) AND (year>=:yearMin AND year <=:yearMax) AND (price>=:priceMin AND price <=:priceMax) ORDER BY id DESC');
$getCars->execute([
    'kmMin' => $kmMin,
    'kmMax' => $kmMax,
    'priceMin' => $priceMin,
    'priceMax' => $priceMax,
    'yearMin' => $yearMin,
    'yearMax' => $yearMax
]);
$carsCount = $getCars->rowCount();
if($carsCount>0){
?>
<div class="row" style="border-left: var(--bs-border-width) solid rgba(199, 200, 201, .8);">
    <?php 
    while($car = $getCars->fetch()){ 
        $generalInformations = json_decode($car['general_informations']);
        $getImage = $bdd->prepare('SELECT name FROM images WHERE annonce_id=:id ORDER BY id ASC');
        $getImage->execute([ 'id' => $car['id'] ]);
        $image = $getImage->fetch();
    ?>
        <div class="col-md-3 custom-spacing">
            <div class="card itemShadow">
                <img src="img/uploads/<?=$image['name'];?>" class="card-img-top">
                <div class="card-body text-right priceBadge">
                    <span class="badge bg-dark"><?=number_format($car['price'],'0', ' ', ' ');?> €</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-uppercase"><b><?=$generalInformations->marque;?> <?=$generalInformations->modele;?></b></h5>
                    <span class="card-text text-muted">Année : <?=$car['year'];?></span><br>
                    <span class="card-text text-muted"><?=$generalInformations->energie;?></span><br>
                    <span class="card-text text-muted"><?=$car['kilometers'];?> km</span><br>
                    <hr>
                    <p><b><?=number_format($car['price'],'0', ' ', ' ');?> €</b></p>
                    <div class="text-center">
                        <a href="annonce?id=<?=htmlspecialchars($car['id']);?>" class="btn btn-sm btn-dark">Détails</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php }else{?>
<div class="alert alert-secondary text-center" role="alert">Aucun résultat</div>
<?php } ?>