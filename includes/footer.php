<?php require_once('db.php');?>
<footer class="footer bg-dark py-5">
    <div class="row align-items-center text-center">
        <div class="col-md">
            <div class="container text-light">
                <p class="display-5 mb-3">Garage V.Parrot</p>
                <small class="text-white-50">&copy; Copyright 2023. Tous les droits réservés.</small>
            </div>
        </div>
        <div class="col-md py-2">
            <h5 class="text-light display-6 text-uppercase">Horaires d'ouverture</h5>
            <?php
            $getSchedule = $bdd->query('SELECT schedule FROM settings');
            $schedule = json_decode($getSchedule->fetch()['schedule']);
            
            $array = get_object_vars($schedule);
            $days = array_keys($array);
            
            ?>
            <table class="table table-sm table-dark w-50 table-borderless m-auto">
                <tbody>
                    <?php $i=0; foreach($schedule as $e){?>
                    <tr>
                        <th scope="row"><?=ucfirst($days[$i]);?></th>
                        <td><?php if($e != 'close' && ($e->am[0] && $e->am[1]) != ''){?><?=$e->am[0];?> - <?=$e->am[1];?><?php }else{ echo 'Fermé'; } ?></td>
                        <td><?php if($e != 'close' && ($e->pm[0] && $e->pm[1]) != ''){?><?=$e->pm[0];?> - <?=$e->pm[1];?><?php }else{ echo 'Fermé'; } ?></td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>
        </div>
    </div> 
</footer>