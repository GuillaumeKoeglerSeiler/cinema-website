<?php

    session_start();

    include "film-functions.php";
    include "menu.php";
    $films = findFilm();
    ?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Film</title>
    </head>
    <body>
        <h1>FILMS</h1>
            <div class="grid">
            <?php
            foreach($films as $film){ ?>
                <div class="film">
                    <h2>
                        <a href='details.php?id=<?=$film['id_film']?>'><i class="fas fa-film"></i> &nbsp;<?=$film['titre']?></a>
                    </h2>
                        <p>
                            <?=$film['realisateur']?>
                        </p>
                        <p>
                            <div class="img">
                                <a href='details.php?id=<?=$film['id_film']?>'><img src="<?= $film['affiche']?>"></a>
                            </div>
                        </p>
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