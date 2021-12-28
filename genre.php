<?php

session_start();
include "genre-functions.php";
include "functions.php";
include "menu.php";

$id_genre = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$id_genreById = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$genres = findFilmByGenre(($_GET['id']));
$genres2 = findGenreById(($_GET['id']));

if(!$id_genre || !$films = findFilmByGenre($_GET["id"])){
    redirect("index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Film par genre</title>
    </head>
    <body>
        <h2>
            GENRE : <?=$genres2['nom_genre']?>
        </h2>
        <?php
        foreach($genres as $genre){ ?>
            <p>
                <a href="details.php?id=<?=$genre['id_film']?>"><?=$genre['titre']?></a>
            </p>
            <div class="img">
                <a href="details.php?id=<?=$genre['id_film']?>">
                    <img src="<?= $genre['affiche']?>">
                </a>
            </div>
        <?php } ?> 
    </body>
</html>
