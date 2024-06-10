<?php

$db;

/***
 * Check if the email is already in the database
 */
function checkAlreadyExistEmail (): mixed
{
 global $db;
 if (!empty($_GET['id'])) {

     $email = getCompte($_POST['mail']);
     if ($email === $_POST['mail']) {
        return false;
     }
 }


$sql = 'SELECT mail FROM compte WHERE mail = :mail';
$query = $db->prepare($sql);
$query->bindParam(':mail', $_POST['mail'], PDO::PARAM_STR);
$query->execute();

return $query->fetch();
}



function updateCompte ()
{

    global $db;
    $data = [
        'mail'=> $_POST['mail'],
        'mdp' => password_hash($_POST['mdp'], PASSWORD_DEFAULT),
        'id' => $_GET['id']
    ];

try {
    $sql = 'UPDATE compte SET mail = :mail, mdp = :mdp, modified = NOW() WHERE id = :id';
    $query = $db->prepare($sql);
    $query->execute($data);
    alert('Un utilisateur a bien été modifié.', 'success');
} catch (PDOException $e) {

    if ($_ENV['DEBUG'] == 'true') {
        dump($e->getMessage());
        die;
    } else {
        alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
    }

}

}

function getCompte ()
{
    

    global $db;

    try {
    $sql = 'SELECT mail FROM compte WHERE id = :id';
    $query = $db->prepare($sql);
    $query->execute(['id' => $_GET['id']]);

    return $query->fetch();
}   catch (PDOException $e){
    if ($_ENV['DEBUG'] == 'true'){
        dump($e->getMessage());
        die;
    
} else {
    Alert('Une ereur est survenue. Merci de réessayer plus tard', 'danger');
}
}

}