<?php

$db;

/***
 * Check if the movie is already in the database
 * I have to check getMovie's function
 */
// function checkAlreadyExistRealisation(): mixed
// {
//     global $db;
//     if (!empty($_GET['id'])) {

//         $title = getRealisation()->title;
//         if ($title === $_POST['client']) {
//             return false;
//         }
//     }


//     $sql = 'SELECT client FROM realisations WHERE client = :client';
//     $query = $db->prepare($sql);
//     $query->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
//     $query->execute();

//     return $query->fetch();
// }

/**
 * Add a user in the database
 */
function addRealisation()
{
    global $db;
    $data = [
        'client' => $_POST['client'],
        'img' => $_POST['img'],
        'lien' => $_POST['lien'],
        'date_publication' => $_POST['date_publication']
    
    ];

    try {
        $sql = 'INSERT INTO realisations (client, img, lien, date_publication) VALUES (:client, :img, :lien, :date_publication)';
        $query = $db->prepare($sql);
        $query->execute($data);
        alert('Un film a bien été ajouté.', 'success');
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
        }
    }
}


function addRealisationCategorie()
{
    global $db;
    $data = [
       'id' => $_GET['id'],
       'catName' => $_POST['catName']
        
    ];

    try {
       $sql = 'SELECT categories.id, categories.name FROM categories
               JOIN categorie ON realisations.id_categorie = categorie.id';

        alert('Un film a bien été ajouté.', 'success');
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
        'title' => $_POST['title'],
        'synopsis' => $_POST['synopsis'],
        'casting' => $_POST['casting'],
        'director' => $_POST['director'],
        'release_date' => $_POST['date'],
        'duration' => $_POST['duration'],
        'photo' => $_POST['photo'],
        'notePress' => $_POST['notePress'],
        'category' => $_POST['category'],
        'id' => $_GET['id']
    ];

    try {
        $sql = 'UPDATE movie SET title = :title, synopsis = :synopsis, duration = :duration, release_date = :release_date, director = :director, casting = :casting, notePress = :notePress, photo = :photo, category = :category, modified = NOW() WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute($data);
        alert('Un film a bien été modifié.', 'success');
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
        $sql = 'SELECT title, synopsis, duration, director, release_date, casting, notePress, photo, category FROM movie WHERE id = :id';
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

// function checkAlreadyExistCat (): mixed
// {
//  global $db;
//  if (!empty($_GET['id'])) {

//      $catName = getCat()->catName;
//      if ($catName === $_POST['catName']) {
//         return false;
//      }
//  }


// $sql = 'SELECT catName FROM categorie WHERE catName = :catName';
// $query = $db->prepare($sql);
// $query->bindParam(':catName', $_POST['catName'], PDO::PARAM_STR);
// $query->execute();

// return $query->fetch();
// }
