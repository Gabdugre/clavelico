<?php

$db;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
$manager = new ImageManager(new Driver());

/**
 * Add a Realisation in the database
 */

function addRealisation()
{
    global $db;
    
    $imgName = uploadFile('../public/images', 'img');

    if (empty($imgName)) {
        alert('Erreur lors du téléchargement de l\'image.', 'danger');
        return;
    }

    $data = [
        'client' => $_POST['client'],
        'img' => $imgName,
        'lien' => $_POST['lien'],
        'date_publication' => $_POST['date_publication'],
        'categorie_id' => $_POST['categorie_id'][0]
        
    ];

    try {
        $sql = 'INSERT INTO realisations (client, img, lien, date_publication, categorie_id) VALUES (:client, :img, :lien, :date_publication, :categorie_id)';
        $query = $db->prepare($sql);
        $query->execute($data);
        alert('Une réalisation a bien été ajouté.', 'success');
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
        }
    }

    try {
        $sql = 'SELECT * FROM categories
                JOIN realisations ON realisations.categorie_id = categorie.id';
 
         alert('Un réalisation a bien été ajouté.', 'success');
     } catch (PDOException $e) {
         if ($_ENV['DEBUG'] == 'true') {
             dump($e->getMessage());
             die;
         } else {
             alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
         }
     }  
}



function updateRealisation()
{

    global $db;
  
    $data = [
        'id' => $_GET['id'],
        'client' => $_POST['client'],
        'img' => $_FILES['img']["name"],
        'lien' => $_POST['lien'],
        'date_publication' => $_POST['date_publication'],
        'categorie_id' => $_POST['categorie_id'][0],
    ];


    try {
        $sql = 'UPDATE realisations SET client = :client, img = :img, lien = :lien, date_publication = :date_publication, categorie_id = :categorie_id WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute($data);
        alert('Une réalisation a bien été modifié.', 'success');
    } catch (PDOException $e) {

        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
        }
    }
}

function getRealisation()
{


    global $db;

    try {
        $sql = 'SELECT client, img, lien, date_publication, categorie_id FROM realisations WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute(['id' => $_GET['id']]);

        return $query->fetch();
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            Alert('Une ereur est survenue. Merci de réessayer plus tard', 'danger');
        }
    }
}

function getCat() 
{
    global $db;

    try {
        $sql = 'SELECT id, catName FROM categories';
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


/**	
 * Upload file
 * 
 * @param string $path to save file
 * @param string $field name of input type file
 */
function uploadFile(string $path, string $field, array $exts = ['jpg', 'jpeg', 'png'], int $maxSize = 2097152): string
{
    // Vérifiez si le formulaire est soumis avec la méthode POST
    if (empty($_FILES)) {
        return '';
    }
    
    // Vérifiez si le répertoire existe, sinon créez-le
    if (!is_dir($path) && !mkdir($path, 0777, true)) {
        return '';
    }

    // Vérifiez si le champ de fichier n'est pas vide
    if (empty($_FILES[$field]['name'])) {
        return '';
    }
    
    // Vérifiez les extensions
    $currentExt = pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION);
    $currentExt = strtolower($currentExt);
    if (!in_array($currentExt, $exts)) {
        return '';
    }

    // Vérifiez s'il n'y a pas d'erreur dans le fichier actuel
    if ($_FILES[$field]['error'] !== UPLOAD_ERR_OK) {
        return '';
    }

    // Vérifiez la taille maximale du fichier actuel
    if ($_FILES[$field]['size'] > $maxSize) {
        return '';
    }

    // Renommez le fichier
    $filename = pathinfo($_FILES[$field]['name'], PATHINFO_FILENAME);
    $filename = renameFile($filename);
    $targetToSave = $path . '/' . $filename . '.' . $currentExt;
    
    // Déplacez le fichier téléchargé
    if (move_uploaded_file($_FILES[$field]['tmp_name'], $targetToSave)) {
        return $filename . '.' . $currentExt;
    }

    return '';
}

function formatBytes($size, $precision = 2) {
	$base     = log($size, 1024);
	$suffixes = ['', 'Ko', 'Mo', 'Go', 'To'];

	return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}


function renameFile(string $name) {
	$name = trim($name);
	$name = strip_tags($name);
	$name = removeAccent($name);
    $name = preg_replace('/[\s-]+/', ' ', $name);  // Clean up multiple dashes and whitespaces
	$name = preg_replace('/[\s_]/', '-', $name); // Convert whitespaces and underscore to dash
	$name = preg_replace('/[^A-Za-z0-9\-]/', '', $name);
	$name = strtolower($name);
	$name = trim($name, '-');

	return $name;
}
function removeAccent($string) {
	$string = str_replace(
		['à','á','â','ã','ä', 'ç', 'è','é','ê','ë', 'ì','í','î','ï', 'ñ', 'ò','ó','ô','õ','ö', 'ù','ú','û','ü', 'ý','ÿ', 'À','Á','Â','Ã','Ä', 'Ç', 'È','É','Ê','Ë', 'Ì','Í','Î','Ï', 'Ñ', 'Ò','Ó','Ô','Õ','Ö', 'Ù','Ú','Û','Ü', 'Ý'], 
		['a','a','a','a','a', 'c', 'e','e','e','e', 'i','i','i','i', 'n', 'o','o','o','o','o', 'u','u','u','u', 'y','y', 'A','A','A','A','A', 'C', 'E','E','E','E', 'I','I','I','I', 'N', 'O','O','O','O','O', 'U','U','U','U', 'Y'], 
		$string
	);
	return $string;
}