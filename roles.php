<?php

session_start();

include "role-functions.php";
include "menu.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$id_role = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$roles = findRole();

?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Roles</title>
    </head>
    <body>
        <h1>ROLES</h1>
            <div class="grid">
            <?php
            foreach($roles as $role){ ?>
                <div class="film">
                    <h2 id="big"><i id="big" class="fas fa-mask"></i>&nbsp;<a href="role.php?id=<?=$role['id_role']?>"><?=$role['nom_role']?></a></h2>
                        <div class="img">
                            <a href='role.php?id=<?=$role['id_role']?>'>
                                <img src="<?= $role['illustration']?>">
                            </a>
                        </div>
                </div>
                <?php } ?> 
            </div>
                <button id="scroll">
                    <i class="fas fa-arrow-up"></i>
                </button>
<script>
    const Scroll = document.querySelector("#scroll")
    Scroll.addEventListener("click", function(){
    window.scrollTo(0, 0)
    })
</script>
</body>
</html>