<?php
require('includes/refresh.php');
require('includes/config.php');
require('functions/comments.function.php');

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
            <p class="text-muted text-left"><a href="gestion">Accueil</a> / Avis</p>
            <hr>
            <div class="row text-center">
                <div class="col-md-3 custom-spacing">
                    <?php include('includes/userInfosCard.php');?>
                </div>
                <div class="col-md verticalSeperatorLeft">
                    <br>
                    <?php if(isset($_GET['r']) && $_GET['r'] == 'error'){?><div class="alert alert-danger" role="alert">Une erreur s'est produite, veuillez réessayer</div><?php }?>
                    <?php if(isset($_GET['r']) && $_GET['r'] == 'deleted'){?><div class="alert alert-success" role="alert">Commentaire supprimé avec succès</div><?php }?>
                    <?php if(isset($_GET['r']) && $_GET['r'] == 'accepted'){?><div class="alert alert-success" role="alert">Commentaire accepté avec succès</div><?php }?>
                    <?php if(isset($_GET['r']) && $_GET['r'] == 'added'){?><div class="alert alert-success" role="alert">Commentaire ajouté avec succès</div><?php }?>
                    <?php include('includes/passwordUpdateMessages.php');?>
                    <?php
                    $getAwaitingReviews = $bdd->query('SELECT id, author, rate, subject, comment, status, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date FROM reviews WHERE status=0 ORDER BY id ASC');
                    $awaitingReviewsCount = $getAwaitingReviews->rowCount();
                    ?>
                    <h5 class="d-flex">Commentaires en attente (<?=$awaitingReviewsCount;?>)</h5>
                    <?php if($awaitingReviewsCount > 0){?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Prénom/nom</th>
                                <th scope="col">Commentaire</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($awaitingReview = $getAwaitingReviews->fetch()){?>
                            <tr>
                                <td><a href="#"><span data-bs-toggle="modal" data-bs-target="#confDel<?=$awaitingReview['id'];?>" class="badge text-bg-danger"><i class="fa-solid fa-trash text-light"></i> Supprimer</span></a> <a href="actions/reviews.php?do=acceptReview&id=<?=$awaitingReview['id'];?>"><span class="badge text-bg-success"><i class="fa-solid fa-circle-check"></i> Approuver</span></a></td>
                                <td><?=$awaitingReview['author'];?></td>
                                <td><?=getStars($awaitingReview['rate'])?> <b><?=$awaitingReview['subject'];?></b>.<br><?=$awaitingReview['comment'];?>.<br><span class="text-muted">Ajouté le <?=$awaitingReview['creation_date'];?></span></td>
                            </tr>
                            <div class="modal fade" id="confDel<?=$awaitingReview['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Supprimer le commentaire de <?=$awaitingReview['author'];?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="text-danger">Cette action est <b>irréversible</b></h5>
                                            <span>Voulez vous vraiment supprimer le commentaire de <b><?=$awaitingReview['author'];?></b> envoyé le <b><?=$awaitingReview['creation_date'];?></b></span><br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <a href="actions/reviews.php?do=delReview&id=<?=$awaitingReview['id'];?>" class="btn btn-sm btn-outline-danger">Supprimer définitivement</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php }else{?>
                        <div class="alert alert-secondary" role="alert">Aucun commentaire en attente</div>
                    <?php } ?>
                    <br>
                    <?php
                    $perPage = 10;
                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($currentPage - 1) * $perPage;

                    $getReviews = $bdd->prepare('SELECT id, author, rate, subject, comment, status, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date FROM reviews WHERE status=1 ORDER BY id DESC LIMIT :l OFFSET :o');
                    $getReviews->bindParam(':l', $perPage, PDO::PARAM_INT);
                    $getReviews->bindParam(':o', $offset, PDO::PARAM_INT);
                    $getReviews->execute();

                    $getTotal = $bdd->query('SELECT COUNT(*) as total FROM reviews WHERE status=1');
                    $totalCount = $getTotal->fetch()['total'];
                    $totalPages = ceil($totalCount / $perPage);
                    ?>
                    <h5 class="d-flex">Commentaires publiés</h5>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Prénom/nom</th>
                                <th scope="col">Commentaire</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($review = $getReviews->fetch()){?>
                            <tr>
                                <td><a href="#"><span class="badge text-bg-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmation<?=$review['id'];?>"><i class="fa-solid fa-trash text-light"></i></span></a></td>
                                <td><?=$review['author'];?></td>
                                <td><?=getStars($review['rate'])?> <b><?=$review['subject'];?></b>.<br><?=$review['comment'];?>.<br><span class="text-muted">Ajouté le <?=$review['creation_date'];?></span></td>
                            </tr>
                            <div class="modal fade" id="deleteConfirmation<?=$review['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Supprimer le commentaire de <?=$review['author'];?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="text-danger">Cette action est <b>irréversible</b></h5>
                                            <span>Voulez vous vraiment supprimer le commentaire de <b><?=$review['author'];?></b> envoyé le <b><?=$review['creation_date'];?></b></span><br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <a href="actions/reviews.php?do=delReview&id=<?=$review['id'];?>" class="btn btn-sm btn-outline-danger">Supprimer définitivement</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addReview"><i class="fa-solid fa-square-plus"></i> Ajouter</button>
                    <div class="modal fade" id="addReview" tabindex="-1" role="dialog" aria-labelledby="addReviewLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addReviewLabel"><i class="fa-solid fa-pen"></i> Ajouter un avis <?=$_SESSION['type'];?></h5>
                                </div>
                                <div class="modal-body">
                                    <form action="actions/reviews.php?do=addReview" method="post">
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="prenom" class="form-label">Prénom</label>
                                                    <input type="text" class="form-control" name="prenom" placeholder="Entrez le prénom" required>
                                                </div>
                                                <div class="col">
                                                    <label for="nom" class="form-label">Nom</label>
                                                    <input type="text" class="form-control" name="nom" placeholder="Entrez le nom" required>
                                                </div>
                                            </div>
                                        </div>
                                        <label for="nom" class="form-label">Note</label>
                                        <select class="form-control custom-select" name="rate" id="inputGroupSelect01" required>
                                            <option value="5" selected>5 étoiles ⭐⭐⭐⭐⭐</option>
                                            <option value="4">4 étoiles ⭐⭐⭐⭐</option>
                                            <option value="3">3 étoiles ⭐⭐⭐</option>
                                            <option value="2">2 étoiles ⭐⭐</option>
                                            <option value="1">1 étoile ⭐</option>
                                        </select>
                                        <br>
                                        <div class="mb-3">
                                            <label for="subject" class="form-label">Sujet</label>
                                            <input type="text" class="form-control" name="subject" placeholder="64 caractères maximum" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="message" class="form-label">Commentaire</label>
                                            <textarea class="form-control" name="message" rows="6" placeholder="350 caractères maximum" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-sm btn-success">Ajouter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-danger">
                            <?php for ($page = 1; $page <= $totalPages; $page++) : ?>
                                <li class="page-item <?php echo ($page == $currentPage) ? 'active' : ''; ?>">
                                    <a class="page-link" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
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