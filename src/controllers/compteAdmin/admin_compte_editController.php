<?php
/**
 * Check format email
 * @param string $email
 * @return bool
 */
function checkEmail (string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

$errorsMessage = [
    'mail' => false,
    'mdp' => false,
    'pwdConfirm' => false
];

if (!empty($_POST)) {
    // Check email format and already exist
    if (!empty($_POST['mail'])) {
        if (!checkEmail($_POST['mail'])) {
            $errorsMessage['mail'] = 'Email non valide';
        } else if (!empty(checkAlreadyExistEmail())) {
            $errorsMessage['mail'] = 'Email existe déjà';
        }
    }

    // Check password format and match with password confirm
    if (!empty($_POST['mdp'])) {
        $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{12,}$/';
        if (!preg_match($regex, $_POST['mdp'])) {
            $errorsMessage['mdp'] = 'Merci de respecter le format indiqué.';
        } else if ($_POST['mdp'] !== $_POST['pwdConfirm']) {
            $errorsMessage['pwdConfirm'] = 'Les mots de passe ne sont pas indentiques.';
        }
    }

    // Save user in database
    if (!empty($_POST['mail']) && !empty($_POST['mdp']) && !empty($_POST['pwdConfirm'])) {
        if (!$errorsMessage['mail'] && !$errorsMessage['mdp'] && !$errorsMessage['pwdConfirm']) {

            if (!empty($_GET['id'])) {
                updateCompte();
            
            }
            // Redirect to users list
              header('Location: ' . $router->generate('compte_admin'));
                die;
        } else {
            alert('Erreur lors de l\'ajout de l\'utilisateur.');
        }
    } else {
        alert('Merci de remplir tous les champs obligatoires.');
    }
} else if (!empty($_GET['id'])) {
    // Read user data and save to $_POST
   $_POST = (array) getCompte();

   //var_dump($_POST);
}