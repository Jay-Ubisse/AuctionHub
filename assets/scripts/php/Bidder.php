<?php
class Bidder {
    public $bidder_id;
    public $last_name;
    public $first_name;
    public $address;
    public $phone_number;

    function __construct($bidder_id, $last_name, $first_name, $address, $phone_number) {
        $this->bidder_id = $bidder_id;
        $this->last_name = $last_name;
        $this->first_name = $first_name;
        $this->address = $address;
        $this->phone_number = $phone_number;
    }

    function __toString() {
        $output = "<h2>Numero de apostador: $this->bidder_id<h2>\n" .
                    "<h2>Nome: $this->first_name $this->last_name<h2>\n" .
                    "<h2>Endereco: $this->address<h2>\n" .
                    "<h2>Celular: $this->phone_number<h2>\n";
        return $output;
    }

    function saveBidder() {
        $db = new mysqli("localhost", "auction_admin", "S3gred0", "auction");
        $query = "INSERT INTO bidders VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param("issss", $this->bidder_id, $this->last_name, $this->first_name, $this->address, $this->phone_number);
        $result = $stmt->execute();
        $db->close();
        return $result;
    }

}
?>