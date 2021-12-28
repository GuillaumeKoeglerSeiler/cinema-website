<?php
/**
 * retourne une instance de PDO, représentant la connexion à la base de données
 * @return \PDO - un objet instance de PDO, représentant la connexion à la base de données
 */
function connexion(){
    return new \PDO(

        "mysql:dbname=cinema;host=localhost:3306",
        "root",
        "",
        [
            \PDO::ATTR_ERRMODE => \PDO ::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO ::FETCH_ASSOC,
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
        ]
    );

}








    