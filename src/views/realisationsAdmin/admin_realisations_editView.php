<?php get_header('Réalisations', 'admin'); ?>



<main>
<form action="" method="post" enctype="multipart/form-data">
<div class="mb-4">
<?php $error = checkEmptyFields('client'); ?>
    <label for="client" class="form-label">Client: *</label>
    <input type="text" name="client" id="client" value="<?= getValue('client'); ?>" class="form-control <?= $error['class']; ?>">
   
</div>
<div class="mb-4">
<?php $error = checkEmptyFields('img'); ?>
    <label for="img" class="form-label">Image: *</label>
    <input type="file" accept="image/png" name="img" id="img" class="form-control <?= $error['class']; ?>" value="<?= getValue('img'); ?>">
   
</div>
<div class="mb-4">
<?php $error = checkEmptyFields('lien'); ?>
    <label for="lien" class="form-label">Lien: *</label>
    <input type="text" name="lien" id="lien" class="form-control <?= $error['class']; ?>" value="<?= getValue('casting'); ?>">
   
</div>
<div class="mb-4">
<?php $error = checkEmptyFields('date_publication'); ?>
    <label for="date_publication" class="form-label">Date de publication: *</label>
    <input type="date" name="date_publication" id="date_publication" value="<?= getValue('date_publication'); ?>" class="form-control <?= $error['class']; ?>">
</div>




<div class="mb-4">
<?php $error = checkEmptyFields('catName'); ?>
<fieldset>
        <legend>Catégories:</legend>
        <!-- Afficher les catégories disponibles avec des cases à cocher -->
        <!-- (implémentation dépendante du langage et du framework utilisés) -->
        <?php
    
            foreach ($cat as $cats) {
          echo '<div>';
                echo "$cats->catName";
                echo '<label>';
                //echo $cats['catName'];
                echo '<input type="radio" id="categorie_id[]" name="categorie_id[]" value="' . $cats->id . '">';
                
                echo '</label>';
          echo '</div>';
            }
            
        ?>
    </fieldset>
</div>
<div>
    <input type="submit" class="btn btn-success" value="Sauvegarder">
</div>
</form>
</main>