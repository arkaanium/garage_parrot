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
        <link rel="stylesheet" href="css/occasions.css">
        <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="assets/fontawesome/css/solid.css" rel="stylesheet">
    </head>
    <body>
        <?php include('includes/menu.php');?>
        <br>
        <div class="occasions-container">
            <div class="row">
                <div class="col-md-3 custom-spacing">
                    <h3 class="card-title"><i class="fas fa-filter"></i> Filtres <button type="button" class="btn btn-sm btn-dark" style="float:right;" onclick="resetFilters()">Réinitialiser</a></h3>
                    <br>
                    <form id="filters">
                        <h5>Kilométrage</h5>
                        <div class="input-group">
                            <input class="form-control" id="kmMin" type="number" placeholder="Km min">
                            <input class="form-control" id="kmMax" type="number" placeholder="Km max">
                        </div>
                        <br>
                        <h5>Prix</h5>
                        <div class="input-group">
                            <input class="form-control" id="priceMin" type="number" placeholder="Prix min">
                            <input class="form-control" id="priceMax" type="number" placeholder="Prix max">
                        </div>
                        <br>
                        <h5>Année</h5>
                        <div class="input-group">
                            <input class="form-control" id="yearMin" type="number" placeholder="Année min">
                            <input class="form-control" id="yearMax" type="number" placeholder="Année max">
                        </div>
                    </form>
                    <br>
                    <hr>
                    <div class="text-center">
                        <button type="button" class="btn btn-darkred" onclick="getCatalog(1)">Rechercher</a>
                    </div>
                </div>
                <div class="col">
                    <div id="items"></div>
                </div>
            </div>
        </div>
        <br>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/catalog.js"></script>
        <?php include('includes/footer.php');?>
    </body>
</html>