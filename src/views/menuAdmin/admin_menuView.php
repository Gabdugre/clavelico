<?php get_header('Menu', 'admin'); ?>

<div>



<div><button><a href="<?= $router->generate('accueil_admin'); ?>">Accueil</a></button></div>

<div><button><a href="<?= $router->generate('service_admin'); ?>">Services</a></button></div>

<div><button><a href="<?= $router->generate('realisationli'); ?>">Réalisations</a></button></div>

<div><button><a href="<?= $router->generate('compte_admin'); ?>">Compte Admin</a></button></div>



    
</div>

<div>
    <input type="submit" value="Sauvegarder">
</div>
</form>


