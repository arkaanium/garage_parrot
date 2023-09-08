<nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid justify-content-center">
        <a class="navbar-brand fs-5 brand" href="index"><img src="img/logo.png" width="150"></a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#list1" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php if(basename($_SERVER['PHP_SELF']) != 'gestion.php'){?>
        <div class="collapse navbar-collapse" id="list1">
            <ul class="navbar-nav ms-auto text-center">
                <li class="nav-item">
                    <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'index.php'){?>active<?php } ?>" aria-current="page" href="index">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'occasions.php'){?>active<?php } ?>" href="occasions">Occasions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'reviews.php'){?>active<?php } ?>" href="reviews">Avis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'contactus.php'){?>active<?php } ?>" href="contactus">Nous contacter</a>
                </li>
            </ul>
        </div>
        <?php } ?>
    </div>
</nav>