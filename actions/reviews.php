<?php
session_start([
    'cookie_lifetime' => 315360000,
]);

require '../includes/db.php';

if(isset($_GET['do'])){
    switch ($_GET['do']) {
        case 'delReview':
            if(isset($_SESSION['id']) && isset($_GET['id'])){
                $delReview = $bdd->prepare('DELETE FROM reviews WHERE id=:id');
                $delReview->execute([ 'id' => htmlspecialchars($_GET['id']) ]);
                header('Location: ../comments?r=deleted');
            }else{
                header('Location: ../comments?r=error');
            }
            break;
        case 'acceptReview':
            if(isset($_SESSION['id']) && isset($_GET['id'])){
                $acceptReview = $bdd->prepare('UPDATE reviews SET status=1 WHERE id=:id');
                $acceptReview->execute([ 'id' => htmlspecialchars($_GET['id']) ]);
                header('Location: ../comments?r=accepted');
            }else{
                header('Location: ../comments?r=error');
            }
            break;
        case 'addReview':
            if(isset($_POST['nom']) && isset($_POST['subject']) && isset($_POST['prenom']) && isset($_POST['rate']) && isset($_POST['message'])){
                if(isset($_SESSION['id']) && $_SESSION['type'] == 'admin'){
                    $status = 1;
                }else{
                    $status = 0;
                }
                $insertReview = $bdd->prepare('INSERT INTO reviews (author, rate, subject, comment, status, creation_date) VALUES (:author, :rate, :subject, :comment, :status, NOW())');
                $insertReview->execute([
                    'author' => htmlspecialchars(ucfirst(strtolower($_POST['prenom'])).' '.ucfirst(strtolower($_POST['nom']))),
                    'rate' => htmlspecialchars($_POST['rate']),
                    'subject' => htmlspecialchars($_POST['subject']),
                    'comment' => htmlspecialchars($_POST['message']),
                    'status' => $status
                ]);
                if(isset($_SESSION['id']) && $_SESSION['type'] == 'admin'){
                    header('Location: ../comments?r=added');
                }else{
                    header('Location: ../reviews?r=added');
                }
            }else{
                header('Location: ../comments?r=error');
            }
            break;
        default:
            header('Location: ../index');
            break;
    }
}else{
    header('Location: ../index');
}