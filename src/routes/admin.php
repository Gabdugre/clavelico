<?php
$admin = '/' . $_ENV['ADMIN_FOLDER'];

$router->addMatchTypes(['uuid' => '[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}']);

// Compte
$router->map( 'GET|POST', $admin . '/connexion', '', '');
$router->map( 'GET', $admin . '/deconnexion', '', ''); 
$router->map( 'GET', $admin . '/compte', '', ''); 
$router->map( 'GET|POST', $admin . '/compte/editer/[uuid:id]', '', ''); 

// Services
$router->map( 'GET', $admin . '/services', '', '');
$router->map( 'GET', $admin . '/services/liste', '', '');
$router->map( 'GET|POST', $admin . '/services/editer/[i:id]', 'movies/admin_movie_edit', 'editMovie');
$router->map( 'GET|POST', $admin . '/services/details/editer/[i:id]', '', '');

// Realisations
$router->map( 'GET', $admin . '/realisations', '', '');
$router->map( 'GET', $admin . '/liste', '', '');
$router->map( 'GET|POST', $admin . '/realisations/editer/[i:id]', '', '');
$router->map( 'GET|POST', $admin . '/realisations/editer', '', '');
$router->map( 'GET', $admin . '/realisations/supprimer/[i:id]', '', '');