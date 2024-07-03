
<?php get_header('Réalisations', 'vitrine'); ?>
<link rel="stylesheet" href="../public/css/realisations.css">
<h1>Réalisations</h1>

<article>
<?php
    
            foreach ($realisations as $realisation) {
          echo '<div class="post">';

          echo '<div class ="task" id= "réalisations">';
          echo '<h2>';
                echo "$realisation->client";
                echo '</h2>';
          echo '</div>';

          echo '<div class ="task" id= "img">';
                echo "$realisation->img";
          echo '</div>';

          echo '<div class ="task" id= "img">';
          echo "$realisation->categorie_id";
          echo '</div>';

          echo '</div>';
            }
            
        ?>
</article>
<?php get_footer('vitrine'); ?>