<?php
    if (!isset($_REQUEST['bidderid']) || (!is_numeric($_REQUEST['bidderid']))) {
        echo "<h2>Não selecionou um liciante na lista.</h2>\n";
        echo "<a href=\"index.php?content=listbidders\">Voltar</a>\n";
    } else {
        $bidderid = $_REQUEST['bidderid'];
        $bidder = Bidder::findBidder($bidderid);
        echo $bidder->__toString();
        echo "<h4>Eventos criados</h4>\n";
        echo "<br><br>\n";
        echo "<h4>Eventos ganhos</h4>\n";
        echo "</section>\n";
    }
?>