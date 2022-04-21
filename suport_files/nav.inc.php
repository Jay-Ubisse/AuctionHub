<?php
    if(!isset($_SESSION['login'])) {
?>
    <div><h4><a class="navlink" href="./userpage.php">Iniciar Sessão</a></h4></div>
    <hr>
<?php
    } else {
        echo "<div><h4>Bem vindo, {$_SESSION['login']}</h4><a class='navlink' href='#'>sair</a></div>\n";
?>
<?php
    include('./assets/scripts/php/User.php');
    $user = User::findUser($_SESSION['login']);
    $un = $user->user_name;
?>
    <hr>
    <ul>
        <li><a class="navlink" href="./index.php">Página Inicial</a></li>
        <li>
            <form method="post" action="./userpage.php">
            <input type="hidden" name="username" value="<?php echo $un; ?>">
            <button type="submit" class="navlink">Meu perfil</button>
            </form>
        </li>
        <li><a class="navlink" href="./index.php?content=listbidders">Liciantes activos</a></li>
        <li><a class="navlink" href="#">Eventos</a></li>
        <li><a class="navlink" href="#">Criar evento</a></li>
    </ul>
    <hr>
    <form action="./index.php" method="post">
        <label>Procurar um item:</label><br>
        <input type="text" name="itemid" size="14"/>
        <input type="submit" value="Procurar"/>
        <input type="hidden" name="content" value="updateitem">
    </form>
    <form action="index.php" method="post">
    <label>Procurar um usuário:</label><br>
    <input type="text" name="username" size="14"/>
    <input type="submit" value="procurar"/>
    <input type="hidden" name="content" value="displaybidder">
    </form>
    <hr>
    <div>
        <p><a class="navlink" href="#">Ajuda</a></p>
    </div>    
<?php
    }
 ?>
