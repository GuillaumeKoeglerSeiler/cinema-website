<?php

include "db-functions.php";


function findByActor($id_filmo){
    $db = connexion();
    $sql = "SELECT titre, affiche,photo2, nom_role, a.id_acteur, nom,prenom, f.id_film, photo, c.id_role, date_naissance, sexe
    FROM acteur a
    INNER JOIN casting c ON c.id_acteur = a.id_acteur
    INNER JOIN film f ON c.id_film = f.id_film
    INNER JOIN role r ON r.id_role = c.id_role
    WHERE c.id_acteur = :id_filmo";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id_filmo", $id_filmo);
    $stmt->execute();
    return $stmt->fetchAll();
}

function findActorById2($id_filmo){
    $db = connexion();
    $sql = "SELECT a.id_acteur,sexe, date_naissance, titre, affiche, CONCAT(prenom,  ' ', nom) AS noms
    FROM acteur a 
    INNER JOIN casting c ON c.id_acteur = a.id_acteur
    INNER JOIN film f ON c.id_film = f.id_film
    WHERE a.id_acteur = :id_filmo";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id_filmo", $id_filmo);
    $stmt->execute();
    return $stmt->fetch(); 
}

function findActeur(){
    $db = connexion();
    $sql = "SELECT id_acteur, photo, CONCAT(prenom, ' ',nom) AS actor
    FROM acteur";
    $stmt = $db->query($sql);
    return $stmt->fetchAll();
}

function formaterDate($date){
    // if($date==NULL){ $date = date('Y-m-d');}
    return utf8_encode(strftime( "%m/%d/%Y" , strtotime($date)));
}
function age($date) { 
    $age = date('Y') - $date; 
   if (date('md') < date('md', strtotime($date))) { 
       return $age - 1; 
   } 
   return $age; 
} 