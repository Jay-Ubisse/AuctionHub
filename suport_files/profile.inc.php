<?php
    
    if(isset($_REQUEST['username'])) {
        $username = $_REQUEST['username'];
        $user = User::findUser($username);
        echo $user->__toString();
        echo "<br><br>";
        echo "<p>Este é o seu perfil. Aqui poderá ver os seus eventos e os eventos nos quis está a participar.<p>\n";
        echo "<p>Para criar ou participar de um evento deve se registrar como liciante. <a id='showform' href='#'>Clique aqui</a> para se registar<p><br><br>\n";
        
		$action = "./assets/scripts/php/bidder_register.php?username=" . $_REQUEST['username'];
?>
    <section id="cadastre">
		<h2>Seja um liciante</h2><br>
		<form name="cadastreform" id="cadastreform" action=<?php echo $action?> method="post">
			<label for="city">Cidade</label>
			<input type="text" name="city"  placeholder="Introduza a cidade em que vive" size="23" autocomplete="false">
			<br>
        	<br>
			<label for="address">endereço</label>
			<input type="text" name="address"  placeholder="Introduza o seu endereço" size="23" autocomplete="false">
			<br>
        	<br>
			<label for="cardnumber">Número de cartão</label>
			<input type="text" name="cardnumber"  placeholder="XXXX-XXXX-XXXX-XXXX" size="26" autocomplete="false">
			<br>
        	<br>
			<label for="cardname">Nome do cartão</label>
			<input type="text" name="cardname"  placeholder="Introduza o nome do cartão" size="23" autocomplete="false">
			<br>
        	<br>
			<label for="securitycode">Código de segurança (CVV)</label>
			<input type="number" name="securitycode" autocomplete="false">
            <br>
            <br>
			<input type="submit" class="submit"	value="Submeter">
		</form>
	</section>
<?php
    } else {
        if (!isset($_REQUEST['bidderid']) || (!is_numeric($_REQUEST['bidderid']))) {
            echo "<h2>Não selecionou um liciante na lista.</h2>\n";
            echo "<a href=\"index.php?content=listbidders\">Voltar</a>\n";
        } else {
			echo "<section id='profileinfo'>\n";
            $bidderid = $_REQUEST['bidderid'];
            $bidder = Bidder::findBidder($bidderid);
            echo $bidder->__toString();
			echo "<button name='editprofile' id='editprofile' onclick='showForm()'>Editar perfil</button>\n";
			echo "<h4></h4>";
			echo "<h4>Eventos criados</h4>\n";
			echo "<br><br>\n";
			echo "<h4>Eventos ganhos</h4>\n";
			echo "</section>\n";
        }
    
?>
<section id="updateinfo">
		<h2>Editar dados</h2><br>
		<form name="updateform" id="updateform" action="./assets/scripts/php/update_info.php" method="post">
		<label for="updatefirstname">Primeiro Nome</label>
			<input type="text" name="updatefirstname"  value="<?php echo $bidder->first_name; ?>" size="23" autocomplete="false">
			<br>
        	<br>
			<label for="updatelastname">Apelido</label>
			<input type="text" name="updatelastname"  value="<?php echo $bidder->last_name; ?>" size="23" autocomplete="false">
			<br>
        	<br>
			<label for="updatecell">Número de celular</label>
			<input type="text" value="+258" disabled="true" size="3" > <input type="tel" name="updatecell" value="<?php echo $bidder->phone_number; ?>" autocomplete="false"><br>
			<br>
        	<br>
			<label for="updatecity">Cidade</label>
			<input type="text" name="updatecity"  value="<?php echo $bidder->city; ?>" size="23" autocomplete="false">
			<br>
        	<br>
			<label for="updateaddress">endereço</label>
			<textarea rows="3" cols="40" name="updateaddress"><?php echo $bidder->address; ?></textarea>
			<br>
        	<br>
			<button onclick="hideForm()">Cancelar</button>
			<input type="submit" class="submit"	value="Alterar">
		</form>
	</section>
<?php
	}
?>
<script src="./assets/scripts/js/jquery-3.6.0.js"></script>
<script src="./assets/scripts/js/jquery.validate.min.js"></script>
<script language="javascript">
	$(document).ready(function() {

		document.cadastreform.city.focus();
		document.cadastreform.city.select();
		
		$("#cadastre").hide();
    	$("#showform").click(function(evt) {
        	evt.preventDefault();
        	$("#cadastre").fadeIn(500);
    	});

		$('#cadastreform').validate({
			rules: {
				securitycode: {
					required: true,
					digits: true,
					minlength: 3,
					maxlength: 3
				},
				cardnumber: {
					required: true,
					creditcard: true,
					minlength: 19,
					maxlength: 19
				},
				city: 'required',
				address: 'required',
				cardname: 'required'
        	},
			messages: {
				securitycode: {
					required: 'Introduza o email',
					digits: 'O código deve conter apenas dígitos',
                    minlength: 'O número deve conter 3 dígitos',
					maxlength: 'O número deve conter 3 dígitos'
				},
				cardnumber: {
					required: 'Introduza o número do cartão.',
					creditcard: 'O número deve conter 16 dígitos separados por ífen (-) em grupos de 4',
				},
				city: 'Introduza o nome da cidade em que vive.',
				adress: 'Introduza o seu endereço completo.',
				cardname: 'Introduza o nome do cartão'
			}
		});
	}); 
</script>
