<?php
    if (!isset($_SESSION['login'])) {
?>
    <h2>Por favor, inicie sessão</h2><br>
    <form name="login" action="../assets/scripts/php/validate.php" method="post">
    <label>Nome de usuário</label>
    <input type="text" name="userid" size="10">
    <br>
    <br>
    <label>Palavra-passe</label>
    <input type="password" name="password" size="10">
    <br>
    <br>
    <input type="submit" value="Entrar">
    <input type="hidden" name="content" value="validate">
    </form>
    <?php
    } else {
        echo "<h2>Welcome</h2>\n";
    }
    ?>
<script language="javascript">
document.login.userid.focus();
document.login.userid.select();
</script>