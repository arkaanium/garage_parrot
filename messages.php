<?php
require('includes/refresh.php');
require('includes/config.php');

if(isset($_SESSION['type']) && ($_SESSION['type'] != 'admin' && $_SESSION['type'] != 'user')){
    header('Location: gestion');
    exit("Vous n'avez pas accès à cette page");
}
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?=$site_name;?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="<?=$logo;?>">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/gestion.css">
        <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="assets/fontawesome/css/solid.css" rel="stylesheet">
    </head>
    <body>
        <?php include('includes/adminNavBar.php');?>
        <br>
        <div class="container ">
            <h5 class="display-6 d-flex">Panneau d'administration</h5>
            <p class="text-muted text-left"><a href="gestion">Accueil</a> / Messagerie</p>
            <hr>
            <div class="row text-center">
                <div class="col-md-3 custom-spacing">
                    <?php include('includes/userInfosCard.php');?>
                </div>
                <div class="col-md verticalSeperatorLeft">
                    <br>
                    <?php if(isset($_GET['r']) && $_GET['r'] == 'error'){?><div class="alert alert-danger" role="alert">Une erreur s'est produite, veuillez réessayer</div><?php }?>
                    <?php if(isset($_GET['r']) && $_GET['r'] == 'read'){?><div class="alert alert-success" role="alert">Message marqué comme lu</div><?php }?>
                    <?php if(isset($_GET['r']) && $_GET['r'] == 'deleted'){?><div class="alert alert-success" role="alert">Message supprimé avec succès</div><?php }?>
                    <?php include('includes/passwordUpdateMessages.php');?>
                    <?php
                    $getMessages = $bdd->query('SELECT id, author, subject, message, email, phone, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date, status FROM messages ORDER BY id DESC');
                    $messageCount = $getMessages->rowCount();
                    if($messageCount > 0){
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Date de récéption</th>
                                <th scope="col">Prénom/nom</th>
                                <th scope="col">Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($message = $getMessages->fetch()){
                                switch ($message['status']) {
                                    case '0':
                                        $text = 'Non lu';
                                        $color = 'success';
                                        break;
                                    case '1':
                                        $text = 'Lu';
                                        $color = 'secondary';
                                        break;
                                }
                            ?>
                            <tr>
                                <td><a href="#"><span class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#delete<?=$message['id'];?>"><i class="fa-solid fa-trash"></i></span></a> <a href="#"><span class="badge bg-success" data-bs-toggle="modal" data-bs-target="#message<?=$message['id'];?>"><i class="fa-solid fa-envelope"></i> Ouvrir</span></a></td>
                                <td><?=htmlspecialchars($message['creation_date']);?></td>
                                <td><?=htmlspecialchars($message['author']);?></td>
                                <td><span class="badge bg-<?=$color;?>"><?=$text;?></span></td>
                            </tr>
                            <div class="modal fade" id="message<?=$message['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel"><span class="badge bg-<?=$color;?>"><?=$text;?></span> <?=htmlspecialchars($message['subject']);?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="d-flex">Informations de contact</h5>
                                            <span class="d-flex"><b>Email</b>: <?=htmlspecialchars($message['email']);?></span>
                                            <span class="d-flex"><b>Téléphone</b>: <?=htmlspecialchars($message['phone']);?></span>
                                            <br>
                                            <h5 class="d-flex">Message</h5>
                                            <span class="d-flex"><?=htmlspecialchars($message['message']);?></span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                            <a href="actions/messages.php?do=markAsRead&id=<?=$message['id'];?>"><button type="button" class="btn btn-sm btn-success">Marquer comme lu</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="delete<?=$message['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer le message de <?=htmlspecialchars($message['author']);?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="text-danger">Cette action est <b>irréversible</b></h5>
                                            <span>Voulez vous vraiment supprimer le message intitulé <b><?=htmlspecialchars($message['subject']);?></b> envoyé par <b><?=htmlspecialchars($message['author']);?></b></span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <a href="actions/messages.php?do=deleteMessage&id=<?=$message['id'];?>"><button type="button" class="btn btn-sm btn-outline-danger">Confirmer la suppression</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php }else{?>
                    <div class="alert alert-secondary text-center" role="alert">Aucun message</div>
                    <?php }?>
                </div>
            </div>
            <hr>
            <p class="text-muted d-flex">Garage V.Parrot &copy; Copyright 2023</p>
        </div>
        <br>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/annonce.js"></script>
    </body>
</html>