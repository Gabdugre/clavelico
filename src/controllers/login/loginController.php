<?php

if (!empty($_POST['mail']) && !empty($_POST['mdp'])) {
$accessUser = checkUserAccess();
if (!empty($accessUser)) {
    $_SESSION['user'] = [
     'id' => $accessUser,
     'lastLogin' => date('Y-m-d H:i:s')
    ];

    saveLastLogin($accessUser);
    
    alert('Vous êtes connecté', 'success');
    header('Location: ' . $router->generate('menu'));
    die;
    } else {
        alert('Identifiants incorrects');

    }
}