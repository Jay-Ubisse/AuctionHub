<?php

/**
 * This class allows to accomplish the follow tasks:
 * Store the bidder information
 * Modify the bidder information
 * Remove an bidder from the bidders table
 * Retrieve the list of all bidders in the bidders table
 * Retrieve an especific bidder information based on his id
 */
class Bidder {
    
    public $bidder_id;
    public $last_name;
    public $first_name;
    public $address;
    public $phone_number;

    const CON_DIR = "./db_connection/connect.php";

    //The constructor for the class
    function __construct($bidder_id, $last_name, $first_name, $address, $phone_number) {
        $this->bidder_id = $bidder_id;
        $this->last_name = $last_name;
        $this->first_name = $first_name;
        $this->address = $address;
        $this->phone_number = $phone_number;
    }

    //displays de bidder info
    function __toString() {
        $output = "<h2>Numero de apostador: $this->bidder_id<h2>\n" .
                    "<h2>Nome: $this->first_name $this->last_name<h2>\n" .
                    "<h2>Endereco: $this->address<h2>\n" .
                    "<h2>Celular: $this->phone_number<h2>\n";
        return $output;
    }


    //saves the bidder info in the DB
    function saveBidder() {
        require(CON_DIR);
        $query = "INSERT INTO bidders VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param("issss", $this->bidder_id, $this->last_name, $this->first_name, $this->address, $this->phone_number);
        $result = $stmt->execute();
        $db->close();
        return $result;
    }

    //updates the bidder info in the DB
    function updateBidder() {
        require(CON_DIR);
        $query = "UPDATE bidders SET bidder_id = ?, last_name = ?, first_name = ?, address = ?, phone_number = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("issss", $this->bidder_id, $this->last_name, $this->first_name, $this->address, $this->phone_number);
        $result = $stmt->execute();
        $db->close();
        return $result;
    }

    //remove the bidder info from the DB
    function removeBidder() {
        require(CON_DIR);
        $query = "DELETE FROM bidders WHERE bidder_id = $this->bidder_id";
        $result = $db->query($query);
        $db->close();
        return $result;
    }

    //get the list of all bidders in the database
    static function getBidders() {
        require(CON_DIR);
        $query = "SELECT * FROM bidders";
        $result = $db->query($query);
        if(mysqli_num_rows($result) > 0) {
            $bidders = array();
            while($row = $result->fech_array(MYSQLI_ASSOC)) {
                $bidder = new Bidder($row['bidder_id'], $row['last_name'], $row['first_name'], $row['address'], $row['phone_number']);
                array_push($bidders, $bidder);
                unset($bidder);
            }
            $db->close();
            return $bidders;
        } else {
            $db->close();
            return NULL;
        }
    }


    //finds a especific bidder based on his id
    static function findBidder($bidder_id) {
        require(CON_DIR);
        $query = "SELECT * FROM bidders WHERE bidder_id = $bidder_id";
        $result = $db->query($query);
        $row = $result->fecth_array(MYSQLI_ASSOC);
        if($row) {
            $bidder = new Bidder($row['bidder_id'], $row['last_name'], $row['first_name'], $row['address'], $row['phone_number']);
            $db->close();
            return $bidder;
        } else {
            $db->close();
            return NULL;
        }

    }
}
?>