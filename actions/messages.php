<?php
session_start([
    'cookie_lifetime' => 315360000,
]);

require '../includes/db.php';

if(isset($_GET['do'])){
    switch ($_GET['do']) {
        case 'sendMessage':
            if(isset($_GET['return']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['telephone']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])){
                $sendMessage = $bdd->prepare('INSERT INTO messages (author, subject, message, email, phone, creation_date, status) VALUES (:author, :subject, :message, :email, :phone, NOW(), 0)');
                $sendMessage->execute([
                    'author' => htmlspecialchars(ucfirst(strtolower($_POST['prenom'])).' '.ucfirst(strtolower($_POST['nom']))),
                    'subject' => htmlspecialchars($_POST['subject']),
                    'message' => htmlspecialchars($_POST['message']),
                    'email' => htmlspecialchars($_POST['email']),
                    'phone' => htmlspecialchars($_POST['phone'])
                ]);
                if($_GET['return'] == 'contactus'){
                    header('Location: ../contactus?r=messageSent');
                }else if($_GET['return'] == 'annonce' && isset($_GET['id'])){
                    header('Location: ../annonce?id='.htmlspecialchars($_GET['id']).'&r=messageSent');
                }else{
                    header('Location: ../contactus?r=error');
                }
            }else{
                header('Location: ../contactus?r=error');
            }
            break;
        case 'markAsRead':
            if(isset($_SESSION['id']) && isset($_GET['id'])){
                $markAsRead = $bdd->prepare('UPDATE messages SET status=1 WHERE id=:id');
                $markAsRead->execute([ 'id' => htmlspecialchars($_GET['id']) ]);
                header('Location: ../messages?r=read');
            }else{
                header('Location: ../messages?r=error');
            }
            break;
        case 'deleteMessage':
            if(isset($_SESSION['id']) && isset($_GET['id'])){
                $deleteMessage = $bdd->prepare('DELETE FROM messages WHERE id=:id');
                $deleteMessage->execute([ 'id' => htmlspecialchars($_GET['id']) ]);
                header('Location: ../messages?r=deleted');
            }else{
                header('Location: ../messages?r=error');
            }
            break;
        default:
            header('Location: ../index');
            break;
    }
}else{
    header('Location: ../index');
}