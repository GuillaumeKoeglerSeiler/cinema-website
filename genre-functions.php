<?php

include "db-functions.php";

function findFilmByGenre($id_genre){
    $db = connexion();
    $sql = "SELECT titre, affiche, ag.id_film, nom_genre
    FROM genre_film g
    INNER JOIN avoir_genre ag ON ag.id_genre = g.id_genre
    INNER JOIN film f ON f.id_film = ag.id_film
    WHERE ag.id_genre = :id_genre";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id_genre", $id_genre);
    $stmt->execute();
    return $stmt->fetchAll();
}

function findGenreById($id_genreById){
    $db = connexion();
    $sql = "SELECT nom_genre
    FROM genre_film g 
    INNER JOIN avoir_genre ag ON g.id_genre = ag.id_genre
    INNER JOIN film f ON ag.id_film = f.id_film
    WHERE ag.id_genre = :id_genreById";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id_genreById", $id_genreById);
    $stmt->execute();
    return $stmt->fetch(); 
    }

    function findGenre(){
        $db = connexion();
        $sql = "SELECT nom_genre, id_genre, illustration
        FROM genre_film g";
        $stmt = $db->query($sql);
        return $stmt->fetchAll();
    }