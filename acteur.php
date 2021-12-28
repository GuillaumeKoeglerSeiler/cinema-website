<?php

session_start();
include "acteur-functions.php";
include "functions.php";
include "menu.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$acteur = findByActor($_GET["id"]);
$act = findActorById2($_GET["id"]);

if(!$id || !$acteur = findByActor($_GET["id"])){
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
        <title>Liste des films d'un acteur</title>
    </head>
    <body>
            <h2>
                <?=$act['noms']?>
            </h2>
                    <p>Sexe : <?=$act['sexe']?></p>
                    <p>Date de naissance : <?=formaterDate($act['date_naissance'])?></p>

            <h3>Filmographie :</h3>
            <?php foreach($acteur as $actor){ ?>
                <p>
                    <a href="details.php?id=<?=$actor['id_film']?>"><?=$actor['titre']?></a>
                    (<a href="role.php?id=<?=$actor['id_role']?>"><?=$actor['nom_role']?>)</a>
                </p>
            </form> <?php } ?> <div class="img"><img src="<?= $actor['photo2']?>"></div>
    </body>
</html>