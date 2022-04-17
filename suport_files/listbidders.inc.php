<script>
        function button_click(target) {
            if(target == 0) document.bidderslist.action = "./userpage.php?content=profile";
            if(target == 1) document.bidderslist.action = "./index.php";
        }
</script>
<?php
    $bidders = Bidder::getBidders();
?>
<form name="bidderslist" method="post">
    <select size="10" name="bidderid">
        <?php
            foreach($bidders as $bidder) {
                $bidderinfo = $bidder->bidder_id . " - " . $bidder->first_name . " " . $bidder->last_name . " - " . $bidder->city;
                echo "<option value='100'>$bidderinfo</option>\n";
            }
        ?>
    </select><br>
    <input type="submit" onclick="button_click(0)" value="Ver perfil">
    <input type="submit" onclick="button_click(1)" value="Entrar no evento">
</form>
