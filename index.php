<?php
    session_start();
   
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
            <?php
                if (!isset($_SESSION['login'])) {
                   include('./suport_files/main_index.inc.php');
                }
                else {
                    if (isset($_REQUEST['content'])) {
                        include("./suport_files/" . $_REQUEST['content'] . ".inc.php");
                    } else {
                        echo "<h3>Olá, {$_SESSION['login']}.</h3>\n";
                        echo "<p>Seja bem vindo ao maior centro de leiões online.</p>\n";
                        echo "<p>Assista aos leilões que estão a decorrer neste exacto momento e acompanhe os lençamentos 
                                dos liciantes do evento em tempo real.</p>\n";
                        echo "<p>Use a janela de navegação para criar ou participar de um leilão.</p><br>\n";
                        echo "<h4>Gostou de algum item e deseja fazer o seu lançamento no leilão?</h4>\n";
                        echo "<p>Simples! Clique sobre o evento que deseja participar, insira os seus dados, faça o seu lançamento
                                e leve o seu item para casa.</p><br>\n";
                        echo "<h4>Tem algum item que deseja leiloar?</h4>\n";
                        echo "<p>Crie um evento clicando em \"Criar evento\" na barra de navegação, insira os seus dados, coloque o 
                                item e a respectiva descrição e o preço Inicial. Pronto, os liciantes podem participar do seu do evento
                                estarão aptos  a fazer os seus lançamentos sobre o seu item.<br><br></p>";
                        echo "<p>Cada evento tem duração de 24 horas. No final do evento, o liciante com o maior lançamento
                                ganha e paga pelo item.</p><br>\n";
                        echo "<h4>Precisa de ajuda?</h4>\n";
                        echo "Clique no menu \"Ajuda\" na barra de navegação.</p>";
    
                    }
                }
                ?>
        </main>
    </section>
    <footer>
        <?php include('./suport_files/footer.inc.php'); ?>
    </footer>
</body>
</html>