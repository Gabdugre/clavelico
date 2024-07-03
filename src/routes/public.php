<?php

// $router->addMatchTypes(['slug' => '[a-z0-9]+(?:-[a-z0-9]+)*']);

// Vitrine

$router->map('GET', '/', 'vitrine/accueil', 'accueil');
$router->map('GET', '/services', 'vitrine/services', 'services');
$router->map('GET', '/services/tarifs', 'vitrine/tarifs', 'services/tarifs');
$router->map('GET', '/realisations', 'vitrine/realisations', 'realisations');
$router->map('GET', '/contacter', 'vitrine/contacter', 'contacter');

// Pages
$router->map( 'GET', '/RGPD', 'vitrine/rgpd', 'rgpd');
$router->map( 'GET', '/mentions-legales', 'vitrine/mentions-legales', 'mentions-legales' );//informations générales de la société