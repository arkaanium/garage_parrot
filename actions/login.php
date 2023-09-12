<?php
session_start([
    'cookie_lifetime' => 315360000,
]);

require '../includes/db.php';
require '../includes/key.php';

if(!isset($_SESSION['id'])){
    if(isset($_POST['email']) && $_POST['email'] != '' && isset($_POST['password']) && $_POST['password'] != ''){
        $findUser = $bdd->prepare('SELECT * FROM users WHERE email=:email');
        $findUser->execute([ 'email' => $_POST['email'] ]);
        $userCount = $findUser->rowCount();
        if($userCount > 0){
            $userInfos = $findUser->fetch();
            if(hash_hmac('sha256',$_POST['password'],$secret) == $userInfos['password']){
                $_SESSION['id'] = $userInfos['id'];
                $_SESSION['name'] = $userInfos['name'];
                $_SESSION['type'] = $userInfos['type'];
                $_SESSION['password'] = $userInfos['password'];
                header('Location: ../gestion?r=connected');
            }else{
                header('Location: ../login?r=error');
            }
        }else{
            header('Location: ../login?r=error');
        }
    }else{
        header('Location: ../login?r=incomplete_fields');
    }
}else{
    header('Location: ../gestion');
}
?>