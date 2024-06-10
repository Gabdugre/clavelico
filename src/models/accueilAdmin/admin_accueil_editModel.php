<?php

$db;

function updateAccueil ()
{

    global $db;
    $data = [
        'presentation_paragraphe'=> $_POST['presentation_paragraphe'],
        'id' => $_GET['id']
    ];

try {
    $sql = 'UPDATE accueil SET presentation_paragraphe = :presentation_paragraphe, modified = NOW() WHERE id = :id';
    $query = $db->prepare($sql);
    $query->execute($data);
    alert('Une presentation a bien été modifiée.', 'success');
} catch (PDOException $e) {

    if ($_ENV['DEBUG'] == 'true') {
        dump($e->getMessage());
        die;
    } else {
        alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
    }

}

}


function getAccueil ()
{
    

    global $db;

    try {
    $sql = 'SELECT presentation_paragraphe FROM accueil WHERE id = :id';
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