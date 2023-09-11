<div class="card">
  <div class="card-body">
      <h1><i class="fa-solid fa-circle-user"></i></h1>
      <h5 class="card-title"><?=$_SESSION['name'];?></h5>
      <?php
      switch ($_SESSION['type']) {
        case 'user':
            $text = 'Employé';
            break;
        case 'admin':
            $text = 'Administrateur';
            break;
      }
      ?>
      <h6 class="card-subtitle mb-2 text-body-secondary"><?=$text;?></h6>
      <hr>
      <a href="actions/disconnect.php"><button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-right-from-bracket"></i></button></a> <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#updatePassword"><i class="fa-solid fa-lock"></i> Modifier mot de passe</button>
  </div>
</div>
<div class="modal fade" id="updatePassword" tabindex="-1" aria-labelledby="updatePasswordLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="updatePasswordLabel">Modifier mot de passe</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="actions/users.php?do=changePassword&return=<?=pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);?>" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <label for="actual_password" class="form-label">Mot de passe actuel</label>
            <input type="password" class="form-control" name="actual_password" placeholder="Entrez votre mot de passe actuel" required>
          </div>
          <div class="mb-3">
            <label for="new_password" class="form-label">Nouveau mot de passe</label>
            <input type="password" class="form-control" name="new_password" placeholder="Entrez le nouveau mot de passe" required>
          </div>
          <div class="mb-3">
            <label for="new_password_repeat" class="form-label">Nouveau mot de passe (répéter)</label>
            <input type="password" class="form-control" name="new_password_repeat" placeholder="Entrez le nouveau mot de passe (répéter)" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-sm btn-success">Valider</button>
        </div>
      </form>
    </div>
  </div>
</div>