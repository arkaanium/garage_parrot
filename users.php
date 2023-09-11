<?php
session_start([
    'cookie_lifetime' => 315360000,
]);

if(!isset($_SESSION['id'])){
    header('Location: login');
    exit();
}

require('includes/config.php');
require('includes/db.php');
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
            <p class="text-muted text-left"><a href="gestion">Accueil</a> / Utilisateurs</p>
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
                    <?php
                    $getUsers = $bdd->query('SELECT id, name, type, email FROM users');

                    if(isset($_GET['r']) && isset($_GET['pass']) && $_GET['r'] == 'added'){?><div class="alert alert-success" role="alert">Utilisateur créé avec succès. Mot de passe temporaire: <b><?=htmlspecialchars($_GET['pass']);?></b></div><?php }
                    if(isset($_GET['r']) && isset($_GET['pass']) && $_GET['r'] == 'success'){?><div class="alert alert-success" role="alert">Mot de passe réinitialisé avec succès. Mot de passe temporaire: <b><?=htmlspecialchars($_GET['pass']);?></b></div><?php }
                    if(isset($_GET['r']) && $_GET['r'] == 'deleted'){?><div class="alert alert-success" role="alert">Utilisateur supprimé avec succès</div><?php }
                    if(isset($_GET['r']) && $_GET['r'] == 'error'){?><div class="alert alert-danger" role="alert">Une erreur s'est produite, veuillez réessayer</div><?php }
                    ?>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Prénom/nom</th>
                                <th scope="col">Groupe</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($user = $getUsers->fetch()){
                                switch ($user['type']) {
                                    case 'user':
                                        $text = 'Employé';
                                        $color = 'secondary';
                                        break;
                                    case 'admin':
                                        $text = 'Administrateur';
                                        $color = 'danger';
                                        break;
                                }
                            ?>
                            <tr>
                                <td><?php if($user['id'] != $_SESSION['id'] && $_SESSION['type'] == 'admin'){?><a href="#"><span class="badge text-bg-danger" data-bs-toggle="modal" data-bs-target="#deleteUser<?=$user['id'];?>" title="Supprimer l'utilisateur"><i class="fa-solid fa-trash text-light"></i></span></a> <a href="#"><span class="badge text-bg-warning" data-bs-toggle="modal" data-bs-target="#resetPassword<?=$user['id'];?>" title="Réinitialiser le mot de passe"><i class="fa-solid fa-arrow-rotate-left"></i></span></a><?php } ?></td>
                                <td><?=htmlspecialchars($user['name']);?></td>
                                <td><span class="badge text-bg-<?=$color;?>"><?=$text;?></span></td>
                                <td><?=htmlspecialchars($user['email']);?></td>
                            </tr>
                            <div class="modal fade" id="deleteUser<?=$user['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel"><?=htmlspecialchars($user['name']);?> : Supprimer l'utilisateur</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="text-danger">Cette action est <b>irréversible</b></h5>
                                            <span>Voulez vous vraiment supprimer l'utilisateur <b><?=htmlspecialchars($user['name']);?></b></span><br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <a href="actions/users.php?do=deleteUser&id=<?=$user['id'];?>"><button type="button" class="btn btn-sm btn-outline-danger">Supprimer définitivement</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="resetPassword<?=$user['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel"><?=htmlspecialchars($user['name']);?> : Réinitialiser mot de passe</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <span>Voulez vous vraiment réinitialiser le mot de passe de l'utilisateur <b><?=htmlspecialchars($user['name']);?></b> ?</span><br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <a href="actions/users.php?do=resetPassword&id=<?=$user['id'];?>"><button type="button" class="btn btn-sm btn-outline-warning">Réinitialiser</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addUser"><i class="fa-solid fa-square-plus"></i> Ajouter</button>
                    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter un utilisateur</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="actions/users.php?do=addUser" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="nom" class="form-label">Nom</label>
                                                    <input type="text" class="form-control" name="nom" placeholder="Entrez le nom" required>
                                                </div>
                                                <div class="col">
                                                    <label for="prenom" class="form-label">Prénom</label>
                                                    <input type="text" class="form-control" name="prenom" placeholder="Entrez le prénom" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="telephone" class="form-label">Adresse email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Entrez l'adresse email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="type" class="form-label">Type de compte</label>
                                            <select class="form-select" name="type" required>
                                                <option value="user" selected>Employé</option>
                                                <option value="admin">Administrateur</option>
                                            </select>
                                        </div>
                                        <span class="d-flex">Après la création du compte, un mot de passe temporaire sera généré aléatoirement. L'utilisateur pourra le changer librement une fois connecté</span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-sm btn-success">Ajouter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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