<?php


$errorsMessage = [
    'presentation_paragraphe' => false,
   
];

if (!empty($_POST)) {
    
    // Save user in database
    if (!empty($_POST['presentation_paragraphe'])) {
        if (!$errorsMessage['presentation_paragraphe']) {

            if (!empty($_GET['id'])) {
                updateAccueil();
            
            }
            // Redirect to users list
              header('Location: ' . $router->generate('accueil_admin'));
                die;
        } else {
            alert('Erreur lors de la modificitation de la présentation.');
        }
    } else {
        alert('Merci de remplir tous les champs obligatoires.');
    }
} else if (!empty($_GET['id'])) {
    // Read user data and save to $_POST
   $_POST = (array) getAccueil();

   var_dump($_POST);
}