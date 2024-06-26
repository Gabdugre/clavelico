<?php

$db;


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