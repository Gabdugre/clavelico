<?php

$db;


function editAccueil ()
{
    global $db;
    $data = [
       
        'id' => $_GET['id'],
        'presentation_paragraphe' => $_POST['presentation_paragraphe'],
        'presentation_image' => $_POST['presentation_image']
    ];
    

    try {
        $sql = 'UPDATE accueil SET presentation_paragraphe = :presentation_paragraphe , presentation_image = :presentation_image WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute($data);
        alert('La présentation a bien été éditée.', 'success');
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue, veuillez essayer plus tard.', 'danger');
        }
    }
}

function getAccueil() 
{
    global $db;
   
    try {
        $sql = 'SELECT id, presentation_paragraphe, presentation_image FROM accueil';
        $query = $db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            Alert('Une ereur est survenue. Merci de réessayer plus tard', 'danger');
        }
    }

}