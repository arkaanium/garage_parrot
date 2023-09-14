<?php
include('includes/config.php');
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Panel administration">
        <meta name="robots" content="noindex,nofollow">
        <title><?=$site_name;?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="<?=$logo;?>">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body class="text-center">
        <div class="vh-100 d-flex justify-content-center align-items-center">
            <form action="actions/login.php" method="post" id="loginForm">
                <div class="card" style="width: 30rem;">
                    <div class="card-header"><img src="<?=$logo;?>" width="300"></div>
                    <div class="card-body">
                        <h3 class="card-title">Authentification</h3>
                        <?php if(isset($_GET['r']) && $_GET['r'] == 'error'){?><div class="alert alert-danger" role="alert">Adresse e-mail ou mot de passe incorrect</div><?php }?>
                        <?php if(isset($_GET['r']) && $_GET['r'] == 'incomplete_fields'){?><div class="alert alert-danger" role="alert">Champs incomplets</div><?php }?>
                        <?php if(isset($_GET['r']) && $_GET['r'] == 'disconnected'){?><div class="alert alert-success" role="alert">Vous êtes maintenant déconnecté</div><?php }?>
                        <?php if(isset($_GET['r']) && $_GET['r'] == 'sessionExpired'){?><div class="alert alert-success" role="alert">Votre session a expiré, veuillez vous reconnecter</div><?php }?>
                        <hr>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">E-Mail</span>
                            <input class="form-control" type="email" name="email" placeholder="Adresse e-mail" required><br>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Mot de passe</span>
                            <input class="form-control" type="password" name="password" placeholder="Mot de passe" required><br>
                        </div>
                        <hr>
                        <button type="submit" id="submitBtn" data-sitekey="6Lep-hkoAAAAAHwYItfXA4ddsuBJLTAo15ZPwet4" data-callback='onSubmit' data-action='submit' class="btn btn-success g-recaptcha">Se connecter</button>
                    </div>
                </div>
                <br>
                <a href="index" class="btn btn-sm btn-secondary">Retour à l'accueil</a>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script type="text/javascript" src="js/login.js"></script>
    </body>
</html>