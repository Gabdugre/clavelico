<?php
$db;

$errorsMessage = [
    'presentation_paragraphe' => false
   
];

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
        alert('Erreur lors de l\'ajout de l\'utilisateur.');
    }
} else {
    alert('Merci de remplir tous les champs obligatoires.');

} if (!empty($_GET['id'])) {
// Read user data and save to $_POST
$_POST = (array) getAccueil(); }

//var_dump($_POST);
