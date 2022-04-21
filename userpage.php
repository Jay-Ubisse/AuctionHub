
<?php
/**
 * Pagina dinamica para inicio de seccao, cadastro e visualizacao de perfil.
 */

    //Iniciar sessao ou retornar uma sessao
    //se esta ja tiver sido iniciada
    session_start(); 
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
            <?php
                //Apresentar o conteudo definido pelo $_REQUEST
                if (isset($_REQUEST['content'])) {
                    include("./suport_files/" . $_REQUEST['content'] . ".inc.php");
                } else {
                    //Se a sessao nao estiver iniciada, apresentar o formulario de inicio de sessao
                    if (!isset($_SESSION['login'])) {
                        include('./suport_files/main_signin.inc.php');
                    } else {
                        //Caso contrario, apresentar o conteudo do perfil do usuario
                        include("./suport_files/my_profile.inc.php");
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