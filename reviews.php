<?php
require('includes/config.php');
require('includes/db.php');
require('functions/comments.function.php');
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
        <link rel="stylesheet" href="css/reviews.css">
        <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="assets/fontawesome/css/solid.css" rel="stylesheet">
    </head>
    <body>
        <?php include('includes/menu.php');?>
        <div class="container">
            <br>
            <div class="row">
                <div class="col-md-3 verticalSeperatorRight">
                    <h3><i class="fa-solid fa-filter"></i> Trier par note</h3>
                    <br>
                    <p><?=getStars(5);?> 5 étoiles (<a href="reviews?rate=5"><?=getReviewCountByRate(5);?></a>)</p>
                    <p><?=getStars(4);?> 4 étoiles (<a href="reviews?rate=4"><?=getReviewCountByRate(4);?></a>)</p>
                    <p><?=getStars(3);?> 3 étoiles (<a href="reviews?rate=3"><?=getReviewCountByRate(3);?></a>)</p>
                    <p><?=getStars(2);?> 2 étoiles (<a href="reviews?rate=2"><?=getReviewCountByRate(2);?></a>)</p>
                    <p><?=getStars(1);?> 1 étoile (<a href="reviews?rate=1"><?=getReviewCountByRate(1);?></a>)</p>
                    <?php if(isset($_GET['rate'])){?><a href="reviews"><span class="badge bg-secondary">Tout afficher</span></a><?php } ?>
                    <hr>
                    <h3><i class="fa-solid fa-pen"></i> Ajouter un avis</h3>
                    <p>Donnez nous votre retour d'expérience avec notre service</p>
                    <br>
                    <button class="btn btn-darkred" type="button" data-bs-toggle="modal" data-bs-target="#addReview">Ecrire un avis</button>
                </div>
                <div class="col-md">
                    <?php
                    $perPage = 10;
                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($currentPage - 1) * $perPage;

                    if(isset($_GET['rate'])){
                        $getReview = $bdd->prepare('SELECT author, rate, subject, comment, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date FROM reviews WHERE status=1 AND rate=:rate ORDER BY id DESC LIMIT :l OFFSET :o');
                        $getReview->bindValue(':rate',htmlspecialchars($_GET['rate']), PDO::PARAM_INT);
                        $getTotal = $bdd->prepare('SELECT COUNT(*) as total FROM reviews WHERE status=1 AND rate=:rate');
                        $getTotal->execute([ 'rate' => htmlspecialchars($_GET['rate']) ]);
                    }else{
                        $getReview = $bdd->prepare('SELECT author, rate, subject, comment, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date FROM reviews WHERE status=1 ORDER BY id DESC LIMIT :l OFFSET :o');
                        $getTotal = $bdd->query('SELECT COUNT(*) as total FROM reviews WHERE status=1');
                    }
                    $getReview->bindParam(':l', $perPage, PDO::PARAM_INT);
                    $getReview->bindParam(':o', $offset, PDO::PARAM_INT);
                    $getReview->execute();
                    
                    $totalCount = $getTotal->fetch()['total'];
                    $totalPages = ceil($totalCount / $perPage);
                    ?>
                    <h3><i class="fa-solid fa-filter"></i> Derniers avis (<?=$totalCount;?>)</h3>
                    <?php while($review = $getReview->fetch()){?>
                        <br>
                        <h3 class="reviewAuthor">
                            <i class="fa-solid fa-circle-user"></i>
                            <span><?=htmlspecialchars($review['author']);?></span>
                        </h3>
                        <?=getStars($review['rate']);?> <b><?=htmlspecialchars($review['subject']);?>.</b>
                        <p class="text-muted reviewDate">Commenté le <?=$review['creation_date'];?></p>
                        <p><?=htmlspecialchars($review['comment']);?>.</p>
                    <?php } ?>
                    <br>
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
            <br>
            <div class="modal fade" id="addReview" tabindex="-1" role="dialog" aria-labelledby="addReviewLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addReviewLabel"><i class="fa-solid fa-pen"></i> Ajouter un avis</h5>
                        </div>
                        <div class="modal-body">
                            <form action="actions/reviews.php?do=addReview" method="post">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <label for="nom" class="form-label">Nom</label>
                                            <input type="text" class="form-control" name="nom" placeholder="Entrez votre nom" required>
                                        </div>
                                        <div class="col">
                                            <label for="prenom" class="form-label">Prénom</label>
                                            <input type="text" class="form-control" name="prenom" placeholder="Entrez votre prénom" required>
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
                                <button type="submit" class="btn btn-sm btn-darkred">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <?php include('includes/footer.php');?>
    </body>
</html>