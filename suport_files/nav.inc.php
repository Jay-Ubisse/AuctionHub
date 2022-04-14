<?php
    if(!isset($_SESSION['login'])) {
        echo "<div><h4>Iniciar Sessão</h4></div>";
    } else {
        echo "<div><h4>Bem vindo, {$_SESSIOM['login']}</h4><a href='#'>sair</a></div>\n";
    }
?>
<ul>
    <li><a href="../index.php">Página Inicial</a><li>
    <li><a href="../pages/userpage.php">Perfil</a><li>
    <li><a href="#">Items em leilão</a><li>
    <li><a href="#">Adicionar novo Item</a><li>
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