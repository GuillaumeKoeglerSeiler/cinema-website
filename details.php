<?php

session_start();
include "film-functions.php";
include "functions.php";
include "menu.php";

//recupère l'id une fois qu'on a cliqué sur la page précédente
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$film = findFilmById(($_GET["id"]));
$acteurs = findCasting($_GET["id"]);

if(!$id || !$product = findCasting($_GET["id"])){
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
        <title>Détails du film</title>
    </head>
    <body>
        <h2>
            <?= $film['titre']?>
        </h2>
            <p><?=$film['resume']?>...</p>
            <p>
                Réalisateur : <a href='realisateur.php?id=<?=$film['id_realisateur']?>'><?=$film['realisateur']?></a>
            </p>
            <p>
                Durée : <?=$film['duree']?> minutes
            </p>
            <p>
                Sortie : <?=$film['annee_sortie']?>
            </p>
            <p>
                Note : <?=$film['note']?>
            </p>
            <p>
                <h3>
                    Casting :
                </h3>
                <?php
                foreach($acteurs as $acteur){ ?> 
                        <a href="acteur.php?id=<?=$acteur['id_acteur']?>"><?=$acteur['prenom']?></a>
                        <a href="acteur.php?id=<?=$acteur['id_acteur']?>"><?= $acteur['nom']?></a>
                        dans le rôle de <a href="role.php?id=<?=$acteur['id_role']?>"><?=$acteur['nom_role']?></a>
                            <br>
                            <br>
                <?php } ?>
                    </p>
                    <p>
                        <div class="img">
                            <img src="<?= $film['affiche']?>">
                        </a>
                    </div>
                </p>
            </form>
    </body>
</html>