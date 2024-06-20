<?php



$errorsMessage = [
    'client' => false,
    'img' => false,
    'lien' => false,
    'date_publication' => false,
    'categorie_id' => false
];


    
    
   
    
    //code !empty répétitif, possibilitée d'imbriqué deux blocs de code ?
    
    //save user in database
if (!empty($_POST['client']) &&  !empty($_FILES['img']) && !empty($_POST['lien'])  && !empty($_POST['date_publication'])) {
    if (!$errorsMessage['client'] &&  !$errorsMessage['img'] && !$errorsMessage['lien'] && !$errorsMessage['date_publication']) {
    
      if (!empty($_GET['id'])) {
                updateRealisation();
            } else {
                addRealisation();
            }
            // Redirect to users list
            header('Location: ' . $router->generate('realisationLi'));
            die;
        } else {
            alert('Erreur lors de l\'ajout de la réalisation.');
        }
    } else {
        alert('Merci de remplir tous les champs obligatoires.');
    }
 if (!empty($_GET['id'])) {
    // Read movie data and save to $_POST
   $_POST = (array) getRealisation();
   
}


 $cat = getCat();