<?php get_header('Description', 'admin'); ?>

<h1 class="mb-4">Editer une description d'un service</h1>

<form action="" method="post" enctype="multipart/form-data">
<div class="mb-4">
<?php $error = checkEmptyFields('description'); ?>
    <label for="description" class="form-label">Description: *</label>
    <textarea rows="4" name="description" id="description"  class="form-control <?= $error['class']; ?>"><?= getValue('description'); ?></textarea>
    <?= $error['message']; ?>
    <?= $errorsMessage['description'];?>
</div>
<?php var_dump($_POST); ?>
<?php getValue('description'); ?>
<div class="submit">
    <input type="submit" class="btn btn-success" value="Sauvegarder">
</div>
</form>