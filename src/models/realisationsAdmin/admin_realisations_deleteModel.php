<?php 
function deleteRealisation () {

global $db;
$sql = 'DELETE FROM realisations WHERE id = :id';
$query = $db->prepare($sql);
$query->execute(['id' => $_GET['id']]);

try {
    $query->execute(['id' => $_GET['id']]);
    alert('La réalisation a bien été supprimé.', 'success');
}  catch (PDOException $e) {
    if ($_ENV['DEBUG'] == 'true') {
        dump($e->getMessage());
        die;
    }else {
        alert('Une erreur est survenue. Merci de réessayer plus tard.', 'danger');
    }
}

}