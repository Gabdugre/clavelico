<?php
function updateRealisation()
{

    global $db;
    $data = [
        'id' => $_GET['id'],
        'description' => $_POST['description']
       
    ];

    try {
        $sql = 'UPDATE services SET description = :description WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute($data);
        alert('Une description a bien été modifié.', 'success');
    } catch (PDOException $e) {

        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
        }
    }
}
