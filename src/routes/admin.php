<?php
$admin = '/' . $_ENV['ADMIN_FOLDER'];

$router->addMatchTypes(['uuid' => '[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}']);

// Compte
$router->map( 'GET|POST', $admin . '/connexion', 'login/Login', 'login');
$router->map( 'GET', $admin . '/deconnexion', 'logout/admin_logout', 'logout'); 
$router->map( 'GET', $admin . '/menu', 'menuAdmin/admin_menu', 'menu'); 
$router->map( 'GET|POST', $admin . '/compte/editer', 'compteAdmin/admin_compte', 'compte_admin'); 

// Accueil
$router->map( 'GET', $admin . '/accueil', 'accueilAdmin/admin_accueil_index', 'accueil_admin');
$router->map( 'GET', $admin . '/accueil/[i:id]', 'accueilAdmin/admin_accueil_edit', 'editAccueil');

// Services
$router->map( 'GET', $admin . '/services', 'servicesAdmin/admin_services', 'service_admin');
$router->map( 'GET', $admin . '/services/tarifs', 'servicesAdmin/admin_services_tarifs', 'tarifs_admin');
$router->map( 'GET|POST', $admin . '/services/editer/[i:id]', 'movies/admin_movie_edit', 'editMovie');


// Realisations
$router->map( 'GET', $admin . '/realisations', 'realisationsAdmin/admin_realisations_index', 'realisationli');
$router->map( 'GET|POST', $admin . '/realisations/editer/[i:id]', '', '');
$router->map( 'GET|POST', $admin . '/realisations/editer', 'realisationsAdmin/admin_realisations_edit', 'addRealisation');
$router->map( 'GET', $admin . '/realisations/supprimer/[i:id]', '', '');