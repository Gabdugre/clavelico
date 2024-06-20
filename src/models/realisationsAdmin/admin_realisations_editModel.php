<?php

$db;
/***
 * Check if the relisation is already in the database
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
        'img' => $_FILES['img']["name"],
        'lien' => $_POST['lien'],
        'date_publication' => $_POST['date_publication'],
        'categorie_id' => $_POST['categorie_id'][0],
        //'id' => $_POST['id'],
        //'catName' => $_POST['catName']
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


// function addRealisationCategorie()
// {
//     global $db;
//     $data = [
//        'id' => $_GET['id'],
//        'catName' => $_POST['catName']
        
//     ];

//     try {
//        $sql = 'SELECT categories.id, categories.catName FROM categories
//                JOIN realisations ON realisations.id_categorie = categorie.id';

//         alert('Un film a bien été ajouté.', 'success');
//     } catch (PDOException $e) {
//         if ($_ENV['DEBUG'] == 'true') {
//             dump($e->getMessage());
//             die;
//         } else {
//             alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
//         }
//     }  
// }

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
        //'id' => $_POST['id'],
        //'catName' => $_POST['catName']
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
