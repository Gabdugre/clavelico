
<?php get_header('Réalisations', 'vitrine'); ?>
<link rel="stylesheet" href="../public/css/reset.css">
<link rel="stylesheet" href="../public/css/realisations.css">
<h1>Réalisations</h1>

<div>
      <h2>Sites Webs</h2>
      <article>
<?php
    
            foreach ($siteWebs as $web) {
          echo '<div class="post">';

          echo '<div class ="task" id= "réalisations">';
          echo '<h2>';
                echo "$web->client";
                echo '</h2>';
          echo '</div>';

          echo '<div class ="task" id= "img">';
          echo '<img src="../../../public/images/'. $web->img . '" alt="' . $web->client . '">';
          echo '</div>';

          echo '</div>';
            }
            
        ?>
</article>
      </div>
      <div>
            <h2>Affiches</h2>
<article>
<?php
    
            foreach ($affiches as $affiche) {
                  echo '<div class="post">';

                  echo '<div class ="task" id= "réalisations">';
                  echo '<h2>';
                        echo "$affiche->client";
                        echo '</h2>';
                  echo '</div>';
        
                  echo '<div class ="task" id= "img">';
                  echo '<img src="../../../public/images/'. $affiche->img . '" alt="' . $affiche->client . '">';
                  echo '</div>';
        
                  echo '</div>';
                    }
            
        ?>
</article>
      </div>

      <div>
            <h2>Identitée visuelle</h2>
<article>
<?php
    
            foreach ($idVisuelles as $idVisuelle) {
                  echo '<div class="post">';

                  echo '<div class ="task" id= "réalisations">';
                  echo '<h2>';
                        echo "$idVisuelle->client";
                        echo '</h2>';
                  echo '</div>';
        
                  echo '<div class ="task" id= "img">';
                  echo '<img src="../../../public/images/'. $idVisuelle->img . '" alt="' . $idVisuelle->client . '">';
                  echo '</div>';
        
                  echo '</div>';
                    }
            
        ?>
</article>
      </div>
<?php get_footer('vitrine'); ?>