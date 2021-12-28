<?php

session_start();
include "role-functions.php";
include "functions.php";
include "menu.php";

//recupère l'id une fois qu'on a cliqué sur la page précédente
$id_role = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$roles = findRoleById(($_GET['id']));
$roles2 = findActeurByRole(($_GET["id"]));

if(!$id_role || !$films = findActeurByRole($_GET["id"])){
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
        <title>Acteurs ayant incarné un rôle</title>
    </head>
    <body>
            <h2>
                Acteurs ayant incarné le rôle de <?= $roles['nom_role']?>
            </h2>
            <?php foreach($roles2 as $role2){ ?>
                <p>
                    <a href="acteur.php?id=<?=$role2['id_acteur']?>"><?=$role2['prenom']?> <?=$role2['nom']?></a> dans le film <a href="details.php?id=<?=$role2['id_film']?>"><?=$role2['titre']?></a>
                </p>
            </form> 
            <?php } ?>
    </body>
</html>