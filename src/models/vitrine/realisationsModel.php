
<?php

function getSiteWeb()
{
    global $db;

    try {
        $sql = 'SELECT id, img, lien, date_publication, client  FROM realisations WHERE categorie_id = 1';
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

    function getAffiche()
{
    global $db;

    try {
        $sql = 'SELECT id, img, lien, date_publication, client  FROM realisations WHERE categorie_id = 2';
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

    function getIdentiteVisuelle()
{
    global $db;

    try {
        $sql = 'SELECT id, img, lien, date_publication, client  FROM realisations WHERE categorie_id = 3';
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