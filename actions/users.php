<?php
session_start([
    'cookie_lifetime' => 315360000,
]);

require '../includes/db.php';
require '../includes/key.php';
require '../functions/users.function.php';

if(isset($_GET['do']) && isset($_SESSION['id'])){
    switch ($_GET['do']) {
        case 'addUser':
            if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['type']) && isset($_SESSION['type']) && $_SESSION['type'] == 'admin'){
                $password = randomPassword();
                $addUser = $bdd->prepare('INSERT INTO users (name, type, email, password, creation_date) VALUES (:name, :type, :email, :password, NOW())');
                $addUser->execute([
                    'name' => htmlspecialchars(ucfirst(strtolower($_POST['prenom'])).' '.ucfirst(strtolower($_POST['nom']))),
                    'type' => htmlspecialchars($_POST['type']),
                    'email' => htmlspecialchars($_POST['email']),
                    'password' => htmlspecialchars(hash_hmac('sha256',$password,$secret))
                ]);
                header('Location: ../users?r=added&pass='.$password);
            }else{
                header('Location: ../users?r=error');
            }
            break;
        case 'deleteUser':
            if(isset($_SESSION['id']) && isset($_GET['id']) && isset($_SESSION['type']) && $_SESSION['type'] == 'admin'){
                $deleteUser = $bdd->prepare('DELETE FROM users WHERE id=:id');
                $deleteUser->execute([ 'id' => htmlspecialchars($_GET['id']) ]);
                header('Location: ../users?r=deleted');
            }else{
                header('Location: ../users');
            }
            break;
        case 'resetPassword':
            if(isset($_SESSION['id']) && isset($_GET['id']) && isset($_SESSION['type']) && $_SESSION['type'] == 'admin'){
                $password = randomPassword();
                $resetPass = $bdd->prepare('UPDATE user SET password=:password WHERE id=:id');
                $resetPass->execute([
                    'password' => htmlspecialchars(hash_hmac('sha256',$password,$secret)),
                    'id' => htmlspecialchars($_GET['id'])
                ]);
                header('Location: ../users?r=success&pass='.$password);
            }else{
                header('Location: ../users');
            }
            break;
        case 'changePassword':
            if(isset($_SESSION['id']) && isset($_POST['actual_password']) && isset($_POST['new_password']) && isset($_POST['new_password_repeat']) && isset($_GET['return'])){
                $checkPassword = $bdd->prepare('SELECT password FROM users WHERE id=:id');
                $checkPassword->execute([ 'id' => $_SESSION['id'] ]);
                $actual_password = $checkPassword->fetch()['password'];
                if(hash_hmac('sha256',$_POST['actual_password'],$secret) == $actual_password){
                    if($_POST['new_password'] == $_POST['new_password_repeat']){
                        $updatePassword = $bdd->prepare('UPDATE user SET password=:password WHERE id=:id');
                        $updatePassword->execute([
                            'password' => htmlspecialchars(hash_hmac('sha256',$_POST['new_password'],$secret)),
                            'id' => htmlspecialchars($_SESSION['id'])
                        ]);
                        header('Location: ../'.htmlspecialchars($_GET['return']).'?r=updated');
                    }else{
                        header('Location: ../'.htmlspecialchars($_GET['return']).'&r=passwordMismatch');
                    }
                }else{
                    header('Location: ../'.htmlspecialchars($_GET['return']).'&r=invalidPassword');
                }
            }else{
                header('Location: ../'.htmlspecialchars($_GET['return']));
            }
            break;
        default:
            header('Location: ../index');
            break;
    }
}else{
    header('Location: ../index');
}