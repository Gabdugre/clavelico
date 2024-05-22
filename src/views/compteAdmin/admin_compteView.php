<?php get_header('Editer un utilisateur', 'admin'); ?>

<h1 class="mb-4">Editer un utilisateur</h1>



<form action="" method="post">
<div class="mb-4">
<?php $error = checkEmptyFields('mail'); ?>
    <label for="mail" class="form-label">Adresse email: *</label>
    <input type="email" name="mail" id="mail" value="<?= getValue('mail'); ?>" class="form-control <?= $error['class']; ?>">
    <?= $error['message']; ?>
    <?= $errorsMessage['mail'];?>
</div>

<div class="mb-4">
<?php $error = checkEmptyFields('mdp'); ?>
    <label for="mdp" class="form-label">Mot de passe: *</label>
    <input type="password" name="mdp" id="mdp"  class="form-control <?= $error['class']; ?>">
    <p class="form-text mb-0">La règle des mdp</p>
    
    <?= $error['message']; ?>
    <?= $errorsMessage['mdp'];?>
</div>

<div class="mb-4"
<?php $error = checkEmptyFields('pwd'); ?>>
    <label for="pwd-confirm" class="form-label">Confirmation du mot de passe: *</label>
    <input type="password" name="pwdConfirm" id="pwd-confirm"  class="form-control <?= $error['class']; ?>">
    <?= $error['message']; ?>
    <?= $errorsMessage['pwdConfirm'];?>
</div>


<div>
    <input type="submit" class="btn btn-success" value="Sauvegarder">
</div>
</form>

<?php get_footer('admin'); ?>