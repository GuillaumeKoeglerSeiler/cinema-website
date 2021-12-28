<?php

include "db-functions.php";


function findRole(){
    $db = connexion();
    $sql = "SELECT nom_role, id_role, illustration
    FROM role";
    $stmt = $db->query($sql);
    return $stmt->fetchAll();
}


function findRoleById($id_role){
    $db = connexion();
    $sql = "SELECT nom_role, c.id_film, a.id_acteur, ro.id_role
    FROM role ro  
    INNER JOIN casting c ON c.id_role = ro.id_role
    INNER JOIN acteur a ON c.id_acteur = a.id_acteur
    INNER JOIN film f ON f.id_film = c.id_film
    WHERE c.id_role = :id_role";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id_role", $id_role);
    $stmt->execute();
    return $stmt->fetch();
}
function findActeurByRole($id_role){
    $db = connexion();
    $sql = "SELECT nom, prenom, titre, affiche, a.id_acteur, f.id_film
    FROM role ro
    INNER JOIN casting c ON c.id_role = ro.id_role
    INNER JOIN acteur a ON c.id_acteur = a.id_acteur
    INNER JOIN film f ON f.id_film = c.id_film
    WHERE ro.id_role = :id_role";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id_role", $id_role);
    $stmt->execute();
    return $stmt->fetchAll();
}