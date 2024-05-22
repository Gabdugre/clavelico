<?php

$errorsMessage = [
    'presentation_paragraphe' => false
];

    // Save categorie in database
    if (!empty($_POST['presentation_paragraphe'])) {
        if (!$errorsMessage['presentation_paragraphe']) {

            
                editAccueil();
            
            // Redirect to users list
            header('Location: ' . $router->generate('editAccueil'));
            die;
        }
    } else {
        alert('Merci de remplir tous les champs obligatoires.');
} if (!empty($_GET['id'])) {
    // Read user data and save to $_POST
   $_POST = (array) getAccueil($_GET['id']);
}