
<link rel="stylesheet" href="../public/css/accueil.css">
<?php get_header('Accueil', 'vitrine'); ?>
bonjour

<?php
    
            foreach ($presentation as $presentations) {
          echo '<div>';
          echo '<div id= "presentation_paragraphe">';
          echo '<h2>';
                echo "$presentations->presentation_paragraphe";
                echo '</h2>';
          echo '</div>';

          echo '<div id= "presentation_image">';
                echo "$presentations->presentation_image";
          echo '</div>';
                //echo '<label>';
                //echo $cats['catName'];
                //echo '<input type="checkbox" name="categories[]" value="' . $cats->catName . '">';
                
               // echo '</label>';
          echo '</div>';
            }
            
        ?>

<?php get_footer('vitrine'); ?>
