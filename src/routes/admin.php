<?php
$admin = '/' . $_ENV['ADMIN_FOLDER'];

$router->addMatchTypes(['uuid' => '[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}']);

// Compte
$router->map( 'GET|POST', $admin . '/connexion', 'login/Login', 'login');
$router->map( 'GET', $admin . '/deconnexion', 'logout/admin_logout', 'logout'); 
$router->map( 'GET', $admin . '/menu', 'menuAdmin/admin_menu', 'menu'); 
$router->map( 'GET|POST', $admin . '/compte/editer', 'compteAdmin/admin_compte_index', 'compte_admin'); 
$router->map( 'GET|POST', $admin . '/compte/editer/[i:id]', 'compteAdmin/admin_compte_edit', 'edit_compte_admin'); 

// Accueil
$router->map( 'GET|POST', $admin . '/accueil/editer', 'accueilAdmin/admin_accueil_index', 'accueil_admin');
$router->map( 'GET|POST', $admin . '/accueil/editer/[i:id]', 'accueilAdmin/admin_accueil_edit', 'editAccueil');

// Services
$router->map( 'GET|POST', $admin . '/services', 'servicesAdmin/admin_services_index', 'service_admin');
$router->map( 'GET|POST', $admin . '/services/tarifs', 'servicesAdmin/admin_services_tarifs', 'tarifs_admin');
$router->map( 'GET|POST', $admin . '/services/editer/[i:id]', 'servicesAdmin/admin_services_edit', 'editService');


// Realisations
$router->map( 'GET|POST', $admin . '/realisations', 'realisationsAdmin/admin_realisations_index', 'realisationLi');
$router->map( 'GET|POST', $admin . '/realisations/editer', 'realisationsAdmin/admin_realisations_edit', 'addRealisation');
$router->map( 'GET|POST', $admin . '/realisations/editer/[i:id]', 'realisationsAdmin/admin_realisations_edit', 'editRealisation');
$router->map( 'GET|POST', $admin . '/realisations/supprimer/[i:id]', 'realisationsAdmin/admin_realisations_delete', 'deleteRealisation');