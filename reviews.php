<?php include('includes/config.php');?>
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
                    <p><i class="fa-solid fa-star text-warning"></i> <i class="fa-solid fa-star text-warning"></i> <i class="fa-solid fa-star text-warning"></i> <i class="fa-solid fa-star text-warning" style="color: red;"></i> <i class="fa-solid fa-star text-warning"></i> 5 étoiles (1)</p>
                    <p><i class="fa-solid fa-star text-warning"></i> <i class="fa-solid fa-star text-warning"></i> <i class="fa-solid fa-star text-warning"></i> <i class="fa-solid fa-star text-warning"></i> 4 étoiles (0)</p>
                    <p><i class="fa-solid fa-star text-warning"></i> <i class="fa-solid fa-star text-warning"></i> <i class="fa-solid fa-star text-warning"></i> 3 étoiles (0)</p>
                    <p><i class="fa-solid fa-star text-warning"></i> <i class="fa-solid fa-star text-warning"></i> 2 étoiles (0)</p>
                    <p><i class="fa-solid fa-star text-warning"></i> 1 étoile (0)</p>
                    <hr>
                    <h3><i class="fa-solid fa-pen"></i> Ajouter un avis</h3>
                    <p>Donnez nous votre retour d'expérience avec notre service</p>
                    <br>
                    <button class="btn btn-darkred" type="button" data-bs-toggle="modal" data-bs-target="#addReview">Ecrire un avis</button>
                </div>
                <div class="col-md">
                    <h3><i class="fa-solid fa-filter"></i> Derniers avis</h3>
                    <br>
                    <h3 class="reviewAuthor">
                        <i class="fa-solid fa-circle-user"></i>
                        <span>Seth</span>
                    </h3>
                    <i class="fa-solid fa-star text-warning"></i> <i class="fa-solid fa-star text-warning"></i> <i class="fa-solid fa-star text-warning"></i> <i class="fa-solid fa-star text-warning"></i> <i class="fa-solid fa-star text-warning"></i> <b>Parfait</b>
                    <p class="text-muted reviewDate">Commenté le 18/02/2023</p>
                    <p>6 mois d utilisation et la manette de prends plus la charge et ne s allume plus malgré une utilisation conforme et pas très régulière, j espère que la garantie fera son travail mais déçue</p>
                    <br>
                    <h3 class="reviewAuthor">
                        <i class="fa-solid fa-circle-user"></i>
                        <span>Seth</span>
                    </h3>
                    <i class="fa-solid fa-star text-warning"></i> <i class="fa-solid fa-star text-warning"></i> <i class="fa-solid fa-star text-warning"></i> <i class="fa-solid fa-star text-warning"></i> <i class="fa-solid fa-star text-warning"></i> <b>Parfait</b>
                    <p class="text-muted reviewDate">Commenté le 18/02/2023</p>
                    <p>6 mois d utilisation et la manette de prends plus la charge et ne s allume plus malgré une utilisation conforme et pas très régulière, j espère que la garantie fera son travail mais déçue</p>                
                    <br>
                    <h3 class="reviewAuthor">
                        <i class="fa-solid fa-circle-user"></i>
                        <span>Seth</span>
                    </h3>
                    <i class="fa-solid fa-star text-warning"></i> <i class="fa-solid fa-star text-warning"></i> <i class="fa-solid fa-star text-warning"></i> <i class="fa-solid fa-star text-warning"></i> <i class="fa-solid fa-star text-warning"></i> <b>Parfait</b>
                    <p class="text-muted reviewDate">Commenté le 18/02/2023</p>
                    <p>6 mois d utilisation et la manette de prends plus la charge et ne s allume plus malgré une utilisation conforme et pas très régulière, j espère que la garantie fera son travail mais déçue</p>
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
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="nom" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" required>
                                    </div>
                                    <div class="col">
                                        <label for="prenom" class="form-label">Prénom</label>
                                        <input type="text" class="form-control" id="prenom" placeholder="Entrez votre prénom" required>
                                    </div>
                                </div>
                            </div>
                            <label for="nom" class="form-label">Note</label>
                            <select class="form-control custom-select" id="inputGroupSelect01" required>
                                <option value="5" selected>5 étoiles ⭐⭐⭐⭐⭐</option>
                                <option value="4">4 étoiles ⭐⭐⭐⭐</option>
                                <option value="3">3 étoiles ⭐⭐⭐</option>
                                <option value="2">2 étoiles ⭐⭐</option>
                                <option value="1">1 étoile ⭐</option>
                            </select>
                            <br>
                            <div class="mb-3">
                                <label for="message" class="form-label">Commentaire</label>
                                <textarea class="form-control" id="message" rows="6" placeholder="350 caractères maximum" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="button" class="btn btn-sm btn-darkred">Envoyer</button>
                        </div>
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