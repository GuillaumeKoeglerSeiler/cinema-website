<?php

session_start();
include "genre-functions.php";
include "functions.php";
include "menu.php";


$genre = findGenre();

?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Genre</title>
    </head>
    <body>
        <h1>GENRES</h1>
            <div class="grid">
            <?php
            foreach($genre as $genres){
            ?>
                <div class="film">
                    <h2 id="big"><i id="big" class="far fa-file-video"></i>&nbsp;<a href="genre.php?id=<?=$genres['id_genre']?>"><?=$genres['nom_genre']?></a></h2>
                        <div class="img">
                            <a href='genre.php?id=<?=$genres['id_genre']?>'>
                                <img src="<?= $genres['illustration']?>">
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