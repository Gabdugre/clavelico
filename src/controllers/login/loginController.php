<?php

if (!empty($_POST['mail']) && !empty($_POST['mdp'])) {
$accessUser = checkUserAccess();
if (!empty($accessUser)) {
    $_SESSION['compte'] = [
     'id' => $accessUser
    ];
    
    alert('Vous êtes connecté', 'success');
    header('Location: ' . $router->generate('menu'));
    die;
    } else {
    alert('Identifiants incorrects');

    }
}