<?php
session_start([
    'cookie_lifetime' => 315360000,
]);

require('db.php');

if (isset($_SESSION['id'])){
    $req = $bdd->prepare('SELECT * FROM users WHERE id = :id');
    $req->execute(array('id' => $_SESSION['id']));
    $checkifexist = $req->rowCount();
    if($checkifexist == 0){
        session_destroy();
        header('Location: actions/disconnect.php');
        exit('Veuillez vous reconnecter');
    }
    $userInfos = $req->fetch();
    if(isset($_SESSION['password']) && $_SESSION['password'] == $userInfos['password']){
        $_SESSION['id'] = $userInfos['id'];
        $_SESSION['name'] = $userInfos['name'];
        $_SESSION['type'] = $userInfos['type'];
    }else{
        session_destroy();
        header('Location: login?r=sessionExpired');
        exit('Session expirée');
    }
}else{
    header('Location: login');
    exit('Non connecté');
}
?>