<?php

unset($_SESSION['compte']);
alert('Vous êtes déconnecté.', 'success');
header('Location: ' . $router->generate('login'));
die;
?>