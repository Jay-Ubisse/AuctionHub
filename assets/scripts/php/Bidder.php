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
    public $user_name;
    public $first_name;
    public $last_name;
    public $city;
    public $address;
    public $phone_number;
    public $card_number;
    public $card_name;
    public $security_code;

    //The constructor for the class
    function __construct($bidder_id, $user_name, $first_name, $last_name, $city, $address, $phone_number, $card_number, $card_name, $security_code) {
        $this->bidder_id = $bidder_id;
        $this->user_name = $user_name;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->city = $city;
        $this->address = $address;
        $this->phone_number = $phone_number;
        $this->card_number = $card_number;
        $this->card_name = $card_name;
        $this->security_code = $security_code;
    }

    //displays de bidder info
    function __toString() {
        $output = "<h3>$this->first_name $this->last_name ($this->user_name)</h3>\n" .
                    "<p>Código de liciante: $this->bidder_id<p>\n" .
                    "<p>Endereço: $this->city - $this->address<p>\n" .
                    "<p>Contacto: $this->phone_number<p>\n";
        return $output;
    }


    //saves the bidder info in the DB
    function saveBidder() {
        require(dirname(__FILE__) . '/db_connection/connect.php');
        $query = "INSERT INTO bidders (user_name, first_name, last_name, city, address, cell_number, card_number, card_name, security_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $dbcon->prepare($query);
        $stmt->bind_param("sssssissi", $this->user_name, $this->first_name, $this->last_name, $this->city, $this->address, $this->phone_number, $this->card_number, $this->card_name, $this->security_code);
        $result = $stmt->execute();
        $dbcon->close();
        return $result;
    }

    //updates the bidder info in the DB
    function updateBidder() {
        require(dirname(__FILE__) . '/db_connection/connect.php');
        $query = "UPDATE bidders SET bidder_id = ?, first_name = ?,  last_name = ?, address = ?, cell_number = ?, card_number = ?, card_name = ?, securiry_code = ?";
        $stmt = $dbcon->prepare($query);
        $stmt->bind_param("issss", $this->bidder_id, $this->first_name, $this->last_name, $this->address, $this->phone_number, $this->card_number, $this->card_name, $this->security_code);
        $result = $stmt->execute();
        $dbcon->close();
        return $result;
    }

    //remove the bidder info from the DB
    function removeBidder() {
        require(dirname(__FILE__) . '/db_connection/connect.php');
        $query = "DELETE FROM bidders WHERE bidder_id = $this->bidder_id";
        $result = $dbcon->query($query);
        $dbcon->close();
        return $result;
    }

    //get the list of all bidders in the database
    static function getBidders() {
        require(dirname(__FILE__) . '/db_connection/connect.php');
        $query = "SELECT * FROM bidders";
        $result = $dbcon->query($query);
        if(mysqli_num_rows($result) > 0) {
            $bidders = array();
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $bidder = new Bidder($row['bidder_id'], $row['user_name'], $row['first_name'], $row['last_name'], $row['city'], $row['address'], $row['cell_number'], $row['card_number'], $row['card_name'], $row['security_code']);
                array_push($bidders, $bidder);
                unset($bidder);
            }
            $dbcon->close();
            return $bidders;
        } else {
            $dbcon->close();
            return NULL;
        }
    }


    //finds a especific bidder based on his id
    static function findBidder($bidder_id) {
        require(dirname(__FILE__) . '/db_connection/connect.php');
        $query = "SELECT * FROM bidders WHERE bidder_id = $bidder_id";
        $result = $dbcon->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if($row) {
            $bidder = new Bidder($row['bidder_id'], $row['user_name'], $row['first_name'], $row['last_name'], $row['city'], $row['address'], $row['cell_number'], $row['card_number'], $row['card_name'], $row['security_code']);
            $dbcon->close();
            return $bidder;
        } else {
            $dbcon->close();
            return NULL;
        }

    }

    //finds a especific bidder based on his user name
    static function findBidderByUserName($user_name) {
        require(dirname(__FILE__) . '/db_connection/connect.php');
        $query = "SELECT * FROM bidders WHERE user_name = '$user_name'";
        $result = $dbcon->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if($row) {
            $bidder = new Bidder($row['bidder_id'], $row['user_name'], $row['first_name'], $row['last_name'], $row['city'], $row['address'], $row['cell_number'], $row['card_number'], $row['card_name'], $row['security_code']);
            $dbcon->close();
            return $bidder;
        } else {
            $dbcon->close();
            return NULL;
        }

    }
}
?>