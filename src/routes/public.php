<?php

$router->addMatchTypes(['slug' => '[a-z0-9]+(?:-[a-z0-9]+)*']);

// Vitrine

$router->map('GET', '/', 'accueil', 'accueil');
$router->map('GET', '/services', '');
$router->map('GET', '/services/details', '');
$router->map('GET', '/tarifs', '');
$router->map('GET', '/realisations', '');
$router->map('GET', '/contacter', '');

// Pages
$router->map( 'GET', '/politique-confidentialite', '');
$router->map( 'GET', '/mentions-legales', '');