<?php
function addLogo ()
{
    global $db;
    $data = [
       
        'picture' => $_POST['picture']
    ];

    try {
        $sql = 'INSERT INTO logo (picture) VALUES (:picture)';
        $query = $db->prepare($sql);
        $query->execute($data);
        echo 'Un logo a bien été ajouté.';
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            echo 'Une erreur est survenue. Merci de réessayer plus tard';
        }
    }
}

function getLogo () 
{
    global $db;

    try {
        $sql = 'SELECT picture FROM logo WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute(['id' => $_GET['id']]);

        return $query->fetch();
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            echo 'Une ereur est survenue. Merci de réessayer plus tard';
        }
    }

}
 
?>