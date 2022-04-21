<?php
    include('./assets/scripts/php/Bidder.php');
    session_start(); //Retorna uma sessao actaulmente iniciada
   
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
        <?php 
        include('./suport_files/header.inc.php'); //inclue o cabecalho
        ?>  
    </header>
    <section id = "container">
        <nav>
            <?php 
                include('./suport_files/nav.inc.php'); //inclue a barra de navegacao
            ?> 
        </nav>
        <aside>
            <?php 
                include('./suport_files/aside.inc.php'); //inclue a barra de informacoes (aside)
            ?> 
        </aside>
        <main>
            <?php
                if (!isset($_SESSION['login'])) {
                   include('./suport_files/main_index.inc.php'); //Se a ssessao nao estiver iniciada, apresentar a pagina inicial para usuarios com sessao nao iniciada
                }
                else {
                    if (isset($_REQUEST['content'])) {
                        include("./suport_files/" . $_REQUEST['content'] . ".inc.php"); // Se a sessao estiver iniciada e ouver alguma requisicao, apresentar o conteudo contido no ficheiro deninido pela requisicap
                    } else {
                        //Se a ssessao estiver iniciada e nao houver alguma requisicao, apresentar a pagina inicial para usuarios com sessao iniciada                                                            
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
        <?php 
            include('./suport_files/footer.inc.php'); //incluir o rodape
        ?>
    </footer>
</body>
</html>