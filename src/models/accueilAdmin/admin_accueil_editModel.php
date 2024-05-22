<?php
function editAccueil ()

    {

        global $db;
        $data = [
            'id' => $_GET['id'],
            'presentation_paragraphe'=> $_POST['presentation_paragraphe']
        ];
    
    try {
        $sql = 'UPDATE accueil SET presentation_paragraphe = :presentation_paragraphe, modified = NOW() WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute($data);
        alert('Une presentation a bien été modifié.', 'success');
    } catch (PDOException $e) {
    
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
        }
    
    }
    }

?>