<?php

function checkUserAccess()
{
    global $db;

    try {
        $sql = 'SELECT id, mdp FROM compte WHERE mail = :mail';
        $query = $db->prepare($sql);
        $query->execute(['mail' => $_POST['mail']]);

        // Fetch the user as an associative array
        $user = $query->fetch(PDO::FETCH_ASSOC);

        // Check if user exists and verify the password
        if ($user && password_verify($_POST['mdp'], $user['mdp'])) {
            return $user['id'];
        } else {
            return false;
        }
    } catch (PDOException $e) {
        // Log the exception message
        error_log('Database error: ' . $e->getMessage());
        return false;
    }
}


function saveLastLogin (string $compteId)
{
    global $db;
    $sql = 'UPDATE compte SET lastLogin = NOW() WHERE id = :id';
    $query = $db->prepare($sql);
    $query->execute(['id' => $compteId]);

    return $query->rowCount();
}
