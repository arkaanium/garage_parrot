<?php
session_start([
    'cookie_lifetime' => 315360000,
]);

if(!isset($_SESSION['id'])){
    header('Location: login');
    exit();
}

require('includes/db.php');
require('includes/config.php');
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
                    <div class="card">
                        <div class="card-body">
                            <h1><i class="fa-solid fa-circle-user"></i></h1>
                            <h5 class="card-title">Vincent Parrot</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Administrateur</h6>
                            <hr>
                            <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-right-from-bracket"></i></button> <button type="button" class="btn btn-sm btn-secondary"><i class="fa-solid fa-lock"></i> Modifier mot de passe</button>
                        </div>
                    </div>
                </div>
                <div class="col-md verticalSeperatorLeft">
                    <br>
                    <?php
                    $getAwaitingReviews = $bdd->query('SELECT * FROM reviews WHERE status=0 ORDER BY id ASC');
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
                                <td>Vincent Parrot</td>
                                <td><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i> 6 mois d utilisation et la manette de prends plus la charge et ne s allume plus malgré une utilisation conforme et pas très régulière, j espère que la garantie fera son travail mais déçue.<br><span class="text-muted">Ajouté le 26/01/2023</span></td>
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

                    $getReviews = $bdd->prepare('SELECT * FROM reviews ORDER BY id DESC LIMIT :l OFFSET :o');
                    $getReviews->bindParam(':l', $perPage, PDO::PARAM_INT);
                    $getReviews->bindParam(':o', $offset, PDO::PARAM_INT);
                    $getReviews->execute();

                    $getTotal = $bdd->query('SELECT COUNT(*) as total FROM reviews');
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
                                <td>Vincent Parrot</td>
                                <td><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i> 6 mois d utilisation et la manette de prends plus la charge et ne s allume plus malgré une utilisation conforme et pas très régulière, j espère que la garantie fera son travail mais déçue.<br><span class="text-muted">Ajouté le 26/01/2023</span></td>
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
                    <button type="button" class="btn btn-sm btn-success"><i class="fa-solid fa-square-plus"></i> Ajouter</button>

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