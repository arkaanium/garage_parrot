<?php
session_start([
    'cookie_lifetime' => 315360000,
]);

require '../includes/db.php';
require '../includes/key.php';

if(!isset($_SESSION['id'])){
    if(isset($_POST['email']) && isset($_POST['password'])){
        $findUser = $bdd->prepare('SELECT * FROM users WHERE email=:email');
        $findUser->execute([ 'email' => $_POST['email'] ]);
        $userCount = $findUser->rowCount();
        if($userCount > 0){
            $userInfos = $findUser->fetch();
            if(hash_hmac('sha256',$_POST['password'],$secret) == $userInfos['password']){
                $_SESSION['id'] = $userInfos['id'];
                $_SESSION['name'] = $userInfos['name'];
                $_SESSION['type'] = $userInfos['type'];
                header('Location: ../gestion?r=connected');
            }else{
                header('Location: login?r=invalid_password');
            }
        }else{
            header('Location: login?r=unknown_user');
        }
    }else{
        header('Location: login?r=incomplete_fields');
    }
}else{
    header('Location: ../gestion');
}
?>