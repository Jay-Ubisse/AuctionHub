<?php
    if(!isset($_SESSION['login'])) {
?>
    <div><h4><a class="navlink" href="./userpage.php">Iniciar Sessão</a></h4></div>
    <hr>
<?php
    } else {
        echo "<div><h4>Bem vindo, {$_SESSION['login']}</h4><a class='navlink' href='#'>sair</a></div>\n";
?>
    <hr>
    <ul>
        <li><a class="navlink" href="./index.php">Página Inicial</a><li>
        <li><a class="navlink" href="./pages/userpage.php">Meu perfil</a><li>
        <li><a class="navlink" href="./index.php?content=listbidders">Liciantes activos</a><li>
        <li><a class="navlink" href="#">Items em leilão</a><li>
        <li><a class="navlink" href="#">Adicionar novo Item</a><li>
    </ul>
    <hr>
    <form action="./index.php" method="post">
        <label>Procurar um item:</label><br>
        <input type="text" name="itemid" size="14"/>
        <input type="submit" value="Procurar"/>
        <input type="hidden" name="content" value="updateitem">
    </form>
    <form action="index.php" method="post">
    <label>Procurar um liciante:</label><br>
    <input type="text" name="bidderid" size="14"/>
    <input type="submit" value="procurar"/>
    <input type="hidden" name="content" value="displaybidder">
    </form>
<?php
    }
 ?>
