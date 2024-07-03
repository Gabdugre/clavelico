<?php



$errorsMessage = [
    'description' => false

];


    
    
   
    
    //code !empty répétitif, possibilitée d'imbriqué deux blocs de code ?
    
    //save user in database
if (!empty($_POST['description'])) {
    if (!$errorsMessage['description']) {
    
      if (!empty($_GET['id'])) {
                updateRealisation();
            }
            // Redirect to users list
            header('Location: ' . $router->generate('service_admin'));
            die;
        } else {
            alert('Erreur lors de la modification de la description.');
        }
    } else {
        alert('Merci de remplir tous les champs obligatoires.');
    }
