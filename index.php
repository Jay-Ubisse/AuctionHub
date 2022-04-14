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
    <title>AuctionHub - Pagina Inicial</title>
    <link rel="stylesheet" href="./assets/styles/global.css" type="text/css" media="screen">
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
            <h3>Bem vindo ao AuctionHub.</h3>
            <p>O AuctionHub permite que você possa participar de leilões online.</p>
            <p>você (ou a sua organização) pode colocar um item para o leilão com um preço Inicial
                e, em seguida, os liciantes participantes do evento estarão apptos  a fazer os seus 
                lançamentos sobre o seu item.</p>
            <p>Cada evento tem duração de 24 horas. No final do evento, o liciante com o maior lançamento
                ganha e paga pelo item.</p>

            <p><a href="./pages/userpage.php">Clique aqui</a> para criar ou participar em um leilão.</p>
        </main>
    </section>
    <footer>
        <?php include('./suport_files/footer.inc.php'); ?>
    </footer>
</body>
</html>