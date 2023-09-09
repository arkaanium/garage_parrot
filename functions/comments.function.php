<?php

function getStars($count) {
    $r = '';
    foreach (range(1, $count) as $star) {
        $r .= '<i class="fa-solid fa-star text-warning"></i>';
    }
    return $r;
}

function getReviewCountByRate($rate){
    require 'includes/db.php';
    $getReviewCount = $bdd->prepare('SELECT id FROM reviews WHERE status=1 AND rate=:rate');
    $getReviewCount->execute([ 'rate' => $rate ]);
    $reviewCount = $getReviewCount->rowCount();
    return $reviewCount;
}

?>