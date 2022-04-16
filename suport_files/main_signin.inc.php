<?php
    if (!isset($_SESSION['login'])) {
?>
    <section id="login">
	<h2>Por favor, inicie sessão</h2><br>
    <form id="logform" name="login" action="./assets/scripts/php/validate.php" method="post">
        <label for="userid">Nome de usuário</label>
        <input type="text" name="userid" size="10">
        <br>
        <br>
        <label for="password">Palavra-passe</label>
        <input type="password" name="password" size="10">
        <br>
        <br>
        <input type="submit" class="submit" value="Entrar">
        <input type="hidden" name="content" value="validate">
        <p>Não tem uma conta? <a href="#" class="mainlink" id="reg">Registre-se!</a></p>
    </form>
    </section>
    <section id="signup">
		<h2>Crie uma conta</h2><br>
		<form id="regform" action="./assets/scripts/php/sign_up.php" method="post">
			<label for="firstname">Primeiro Nome</label>
			<input type="text" name="firstname"  placeholder="Introduza o primeiro nome" size="23" autocomplete="false">
			<br>
        	<br>
			<label for="lastname">Apelido</label>
			<input type="text" name="lastname"  placeholder="Introduza o apelido" size="23" autocomplete="false">
			<br>
        	<br>
			<label for="username">Nome de usuário</label>
			<input type="text" name="username" placeholder="Letras, números e sublinhados (_)" size="26" autocomplete="false">
			<br>
        	<br>
			<label for="email">Email</label>
			<input type="text" name="email" placeholder="Introduza o Email" size="23" autocomplete="false">
			<br>
        	<br>
			<label for="cell">Número de celular</label>
			<input type="text" value="+258" disabled="true" size="3" > <input type="tel" name="cell" autocomplete="false"><br>
			<br>
        	<br>
			<label for="password">Palavra-Passe</label>	
			<input type="password" id="password" name="password" placeholder="Introduza a palavra-passe">
			<br>
        	<br>
			<label for="comfirmPassword">Confirmar Palavra-Passe</label>	
			<input type="password" name="confirmPassword" id="confirmPassword" placeholder="Reintroduza a palavra-passe">
			<br>
			<p>No minimo 6 caracteres e no máximo 15. Apenas letras e numeros</p>
			<input type="submit" class="submit"	value="Criar conta">
			<p>Ja tem uma conta? <a href="#" class="mainlink" id="sign">Entre!</a></p>
		</form>
	</section>
    <?php
    } else {
        echo "<h2>Welcome</h2>\n";
    }
    ?>
<script src="./assets/scripts/js/jquery-3.6.0.js"></script>
<script language="javascript">
	document.login.userid.focus();
	document.login.userid.select();
	$("#signup").hide();
    $("#reg").click(function(evt) {
        evt.preventDefault();
        $("#login").hide();
        $("#signup").fadeIn(500);
    });
    $("#sign").click(function(evt) {
        evt.preventDefault();
            $("#signup").hide();
            $("#login").fadeIn(500);
        });
</script>