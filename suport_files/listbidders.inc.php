
<script language="javascript">
    function listbox_dblclick() {
        document.bidders.displaybidder.click() 
    }
</script>
<script language="javascript">\
    function button_click(target) {
        if(target==0) bidders.action="index.php?content=displaybidder"
        if(target==1) bidders.action="index.php?content=removebidder"
        if(target==2) bidders.action=\"index.php?content=updatebidder"
    }
</script>
<?php
    $bidders = Bidder::getBidders();
    echo "<h2>Selecione o Liciante</h2>\n";
    echo "<form name='bidders' method='post'>\n";
    echo "<select ondblclick=\"listbox_dblclick()\" name=\"bidderid\" size=\"20\">\n";
    foreach($bidders as $bidder) {
        echo "<option value='$bidderid'>" . $bidder->bidder_id . " - " . $bidder->first_name . " " . $bidder->last_name . " - " . $bidder->city . "</option>\n";
    }
    echo "</select><br>\n";
    echo "<input type=\"submit\" onClick=\"button_click(0)\" name=\"displaybidder\" value=\"View Bidder\">\n";
    echo "<input type=\"submit\" onClick=\"button_click(1)\" name=\"deletebidder\" value=\"Delete Bidder\">\n";
    echo "<input type=\"submit\" onClick=\"button_click(2)\" name=\"updatebidder\" value=\"Update Bidder\">\n";
    echo "</form>";
?>
