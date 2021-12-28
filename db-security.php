<?php

include "db-functions.php";
/**
 *permet de retrouver si un user est deja existant dans la base de donnees 
 * return TRUE un user si existant, FALSE si introuvable en base de données
 */
    function findByUsernameOrEmail($username, $email){
        $db = connexion();
        $sql = "SELECT * FROM user WHERE email = :email OR username = :username";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ":username" => $username,
            ":email" => $email
        ]);
        return $stmt->fetch();
    }
    /**
     * permet d'insérer un nouveau user en bdd
     * return TRUE si tout les champs sont valides, message d'erreur si les filtres
     * ont trouvé une anomalie dans les champs
     */
    function insertUser($username, $email, $hash){
        $db = connexion();
        $sql = "INSERT INTO user (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ":username" => $username,
            ":email" => $email,
            ":password" => $hash
        ]);
    }