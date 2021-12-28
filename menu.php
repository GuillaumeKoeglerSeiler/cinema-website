<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>menu</title>
    </head>
</html>
<header>
    <nav>
        <div class="menu">
            <a class="amenu" href="index.php">FILMS</a>
            <a class="amenu" href="acteurs.php">ACTEURS</a>
            <a class="amenu" href="realisateurs.php">REALISATEURS</a>
            <a class="amenu" href="genres.php">GENRES</a>
            <a class="amenu" href="roles.php">ROLES</a>


            <?php
                if(isset($_SESSION['user'])){
                    ?>
                    <span class="amenu"><?= $_SESSION['user']['username'] ?></span>
                    <a class="amenu" href="security.php?action=logout">DECONNEXION</a>
                    <?php
                } else{
                    ?>
                    <a class="amenu" href="login.php">CONNEXION</a>
                    <a class="amenu" href="register.php">INSCRIPTION</a>
                    <?php
                }
            ?>
        </div>
    </nav>
</header>