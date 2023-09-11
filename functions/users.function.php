<?php
function randomPassword() {
    $caracter = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@!$.^';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($caracter) - 1; //put the length -1 in cache
    for ($i = 0; $i < 11; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $caracter[$n];
    }
    return implode($pass); //turn the array into a string
}
?>