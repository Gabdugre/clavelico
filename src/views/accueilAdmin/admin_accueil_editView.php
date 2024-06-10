<?php get_header('edité la présentation', 'admin'); ?>

<h1 class="mb-4">Editer une presentation</h1>



<form action="" method="post">
<div class="mb-4">
<?php $error = checkEmptyFields('presentation_paragraphe'); ?>
    <label for="presentation_paragraphe" class="form-label">presentation: *</label>
    <textarea rows="4" name="presentation_paragraphe" id="presentation_paragraphe"  class="form-control <?= $error['class']; ?>"><?php echo (getValue('presentation_paragraphe')); ?></textarea>
    <?= $error['message']; ?>
    <?= $errorsMessage['presentation_paragraphe'];?>
</div>
<?php var_dump($_POST); ?>
<?php getValue('presentation_paragraphe'); ?>
<div class="submit">
    <input type="submit" class="btn btn-success" value="Sauvegarder">
</div>
</form>

<?php get_footer('admin'); ?>