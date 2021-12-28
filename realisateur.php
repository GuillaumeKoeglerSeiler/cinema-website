<?php

session_start();
include "realisateur-functions.php";
include "functions.php";
include "menu.php";

//recupère l'id une fois qu'on a cliqué sur la page précédente
$id_realisateur = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$realisateur = findRealById($_GET["id"]);
$films = findFilmByReal($_GET["id"]);

if(!$id_realisateur || !$films = findFilmByReal($_GET["id"])){
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Liste des films du réalisateur</title>
    </head>
    <body>
        <h2>
            Liste des films de <?= $realisateur['prenom']?> <?= $realisateur['nom']?>
        </h2>
        <?php foreach($films as $real){ ?>
            <p><a href="details.php?id=<?=$real['id_film']?>"><?=$real['titre']?></a>
            </p>
            <p>
                <div class="img">
                    <a href="details.php?id=<?=$real['id_film']?>"><img src="<?=$real['affiche']?>"></a>
                </div>
            </p>
        <?php } ?>
    </body>
</html>