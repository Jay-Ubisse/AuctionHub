<?php
    $bidders = Bidder::getBidders(); //criar um objecto com a lista de todos os liciantes registrados
?>
<form name="bidderslist" method="post">
    <select size="10" name="bidderid">
        <?php
            //Percorrer a lista de liciantes e apresentar as informacoes dentro da estrutura select
            foreach($bidders as $bidder) { 
                if($bidder->user_name != $_SESSION['login']) {
                    $bidderinfo = $bidder->bidder_id . " - " . $bidder->first_name . " " . $bidder->last_name . " - " . $bidder->city;
                    echo "<option value='$bidder->bidder_id'>$bidderinfo</option>\n";
                }
            }
        ?>
    </select><br>
    <input type="submit" onclick="button_click(0)" value="Ver perfil"> <!--Ao clicar o botao "ver perfil", executar a primeira instrucao do condigo dentro da funcao "button_click" -->
    <input type="submit" onclick="button_click(1)" value="Entrar no evento"> <!--Ao clicar o botao "entrar no evento", executar a segunda instrucao do condigo dentro da funcao "button_click" -->
</form>

<!-- Codigo Javascript -->
<script>
        function button_click(target) {
            if(target == 0) document.bidderslist.action = "./userpage.php?content=user_profile";
            if(target == 1) document.bidderslist.action = "./index.php";
        }
</script>
