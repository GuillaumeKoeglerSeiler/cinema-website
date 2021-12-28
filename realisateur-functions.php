<?php

include "db-functions.php";

function findRealById($id_realisateur){
    $db = connexion();
    $sql = "SELECT nom, prenom, r.id_realisateur, titre, affiche FROM realisateur r 
    INNER JOIN film f ON r.id_realisateur = f.id_realisateur
    WHERE r.id_realisateur = :id_realisateur";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id_realisateur", $id_realisateur);
    $stmt->execute();
    return $stmt->fetch();
}

function findFilmByReal($id_realisateur){
    $db = connexion();
    $sql = "SELECT titre, affiche, id_film
    FROM realisateur r
    INNER JOIN film f on f.id_realisateur = r.id_realisateur
    WHERE r.id_realisateur = :id_realisateur";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id_realisateur", $id_realisateur);
    $stmt->execute();
    return $stmt->fetchAll();
}

/**
 * retourne un realisateur spécifique identifié par un id
 * @param int $id - identifiant du produit selectionné
 */

function findReal(){
    $db = connexion();
    $sql = "SELECT id_realisateur, photo, CONCAT(prenom, ' ',nom) AS realo
    FROM realisateur";
    $stmt = $db->query($sql);
    return $stmt->fetchAll();
}