<?php
session_start([
    'cookie_lifetime' => 315360000,
]);
session_destroy();
header('Location: ../login');
?>