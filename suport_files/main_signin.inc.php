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
		<form id="regform" action="./assets/scripts/php/enroll.php" method="post">
			<label for="firstname">Primeiro Nome</label>
			<input type="text" name="firstname"  placeholder="Introduza o primeiro nome" size="23" autocomplete="false">
			<br>
        	<br>
			<label for="lastname">Apelido</label>
			<input type="text" name="lastname"  placeholder="Introduza o apelido" size="23" autocomplete="false">
			<br>
        	<br>
			<label for="username">Nome de usuário</label>
			<input type="text" name="username"  placeholder="Letras, números e sublinhados (_)" size="26" autocomplete="false">
			<br>
        	<br>
			<label for="email">Email</label>
			<input type="text" name="email"  placeholder="Introduza o Email" size="23" autocomplete="false">
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
			<label for="comfirmpassword">Confirmar Palavra-Passe</label>	
			<input type="password" name="confirmpassword" id="confirmpassword" placeholder="Reintroduza a palavra-passe">
			<br>
			<p>No minimo 6 caracteres e no máximo 15.</p>
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
<script src="./assets/scripts/js/jquery.validate.min.js"></script>
<script language="javascript">
	$(document).ready(function() {

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

		$('#regform').validate({
			rules: {
            	password: {
                	required: true,
                	rangelength : [8,15]
            	},
            	confirmpassword: {
                	equalTo: '#password',
                	required: true
            	},
				email: {
					required: true,
					email: true
				},
				cell: {
					required: true,
					digits: true,
					minlength: 9,
					maxlength: 9
				},
				firstname: 'required',
				lastname: 'required',
				username: 'required'
        	},
			messages: {
				password: {
					required: 'Introduza uma palavra passe.',
					rangelength: 'A palavra passe deve ter entre 8 a 15 caracteres.'
				},
				confirmpassword: {
					equalTo: 'A palavra-passe deve ser igua a anterior.',
					required: 'Introduza novamente a palavra passe.'
				},
				email: {
					required: 'Introduza o email',
					email: 'Introduza um endereço de email válido.'
				},
				cell: {
					required: 'Introduza o seu número de celular.',
					digits: 'Introduza apenas dígitos.',
					minlength: 'O número de celular deve conter 9 dígitos',
					maxlength: 'O número de celular deve conter 9 dígitos'
				},
				firstname: 'Introduza o seu primeiro nome.',
				lastname: 'Introduza o seu apelido.',
				username: 'Introduza um nome de usuário'
			}
		});

		$('#logform').validate({
			rules : {
				userid: 'required',
				password: 'required'
			},
			messages: {
				userid: "Introduza o nome de usuario",
				password: "Introduza a palavra passe"
			}
		});
	}); 
</script>