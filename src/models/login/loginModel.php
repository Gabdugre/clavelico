<?php

function checkUserAccess ()
{
    global $db;
    $sql = 'SELECT id, mdp FROM compte WHERE mail = :mail';
    $query = $db->prepare($sql);
    $query->execute(['mail' => $_POST['mail']]);

    $user = $query->fetch();

if (password_verify($_POST['mdp'], $user->mdp)) {
    return $user->id;
} else {
    return false;
}
}