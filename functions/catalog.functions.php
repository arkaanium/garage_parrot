<?php

function getMaxValue($value) {
    require '../includes/db.php';
    $getMaxVal = $bdd->query('SELECT '.$value.' FROM cars ORDER BY '.$value.' DESC LIMIT 1');
    $maxVal = $getMaxVal->fetch();
    return $maxVal[$value];
}

function getMinValue($value) {
    require '../includes/db.php';
    $getMinVal = $bdd->query('SELECT '.$value.' FROM cars ORDER BY '.$value.' ASC LIMIT 1');
    $minVal = $getMinVal->fetch();
    return $minVal[$value];
}

?>

