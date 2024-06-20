<?php

function getRealisation()
{
    global $db;

    try {
        $sql = 'SELECT id, img, lien, date_publication, client, categorie_id FROM realisations';
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