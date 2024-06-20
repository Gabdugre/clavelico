<?php

if (!empty($_GET['id'])) {
    if (!empty($_GET['id'])) {
        deleteRealisation();
    }

}
header('Location: ' . $router->generate('realisationLi'));