<?php

include "db-functions.php";


function findCasting($id_cast){
    $db = connexion();
    $sql = "SELECT nom, prenom, date_naissance, sexe, nom_role, titre, a.id_acteur, c.id_role
    FROM casting c
    INNER JOIN acteur a ON c.id_acteur = a.id_acteur
    INNER JOIN role r ON r.id_role = c.id_role
    INNER JOIN film f ON f.id_film = c.id_film 
    WHERE c.id_film = :id_cast";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id_cast", $id_cast);
    $stmt->execute();
    return $stmt->fetchAll();
}


/**
 * retourne un film spécifique identifié par un id
 * @param int $id - identifiant du produit selectionné
 */
function findFilmById($id_film){
    $db = connexion();
    $sql = "SELECT titre, affiche, duree, resume, annee_sortie, note, id_film, r.id_realisateur, CONCAT(prenom, ' ',nom) AS realisateur 
    FROM film
    INNER JOIN realisateur r ON r.id_realisateur = film.id_realisateur 
    WHERE id_film = :id_film";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id_film", $id_film);
    $stmt->execute();
    return $stmt->fetch();
}
/**
 * retourne tous les films de la base de données
 * @return array|false un tableau contenant les films sous forme de tableau, un tableau vide si aucun produit n'est présent en base FALSE si la requête à échouée
 * 
 */
function findFilm(){
    $db = connexion();
    $sql = "SELECT titre, duree, affiche, resume, annee_sortie, note, id_film, f.id_realisateur, CONCAT(prenom, ' ',nom) AS realisateur
    FROM film  f 
    INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur";
    $stmt = $db->query($sql);
    return $stmt->fetchAll();
}