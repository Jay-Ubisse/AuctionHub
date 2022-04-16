<?php
    session_start();
    include('./assets/scripts/php/Bidder.php');
    include('./assets/scripts/php/Items.php');
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AuctionHub - Perfil</title>
    <link rel='stylesheet' type='text/css' href='./assets/styles/global.css'>
    <link rel='stylesheet' type='text/css' href='./assets/styles/userpage.css'>
</head>
<body>
    <header>
        <?php include('./suport_files/header.inc.php'); ?>
    </header>
    <section id = "container">
        <nav>
            <?php include('./suport_files/nav.inc.php'); ?>
        </nav>
        <aside>
            <?php include('./suport_files/aside.inc.php'); ?>
        </aside>
        <main>
            <?php include('./suport_files/main_signin.inc.php'); ?>
        </main>
    </section>
    <footer>
        <?php include('./suport_files/footer.inc.php'); ?>
    </footer>
</body>
</html>