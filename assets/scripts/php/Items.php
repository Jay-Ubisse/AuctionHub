<?php
    /**
     * This class allows to accomplish the follow tasks:
    * Store the item information
    * Modify the item information
    * Remove an item from the bidders table
    * Retrieve the list of all items in the items table
    * Retrieve an especific item information based on his id 
     */

    class Items {
        public $item_id;
        public $item_name;
        public $item_description;
        public $resale_price;
        public $win_bidder;
        public $win_price;

        const CON_DIR = "./db_connection/connect.php";

        function __construct($item_id, $item_name, $item_description, $resale_price, $win_bidder, $win_price) {
            $this->item_id = $item_id;
            $this->item_name = $item_name;
            $this->item_description = $item_description;
            $this->resale_price = $resale_price;
            $this->win_bidder = $win_bidder;
            $this->win_price = $win_price;
        }

        //displays de bidder info
        function __toString() {
            $output = "<h2>Numero do Item: $this->item_id<h2>\n" .
                    "<h2>Nome do item: $this->item_name<h2>\n" .
                    "<h2>Descricao: $this->item_description<h2>\n" .
                    "<h2>Preço de revenda: $this->resale_price<h2>\n";
                    "<h2>Aposta Vencedora: $this->win_bit por $this->win_price<h2>\n";
            return $output;
        }

        function saveItem() {
            require(CON_DIR);
            $query = "INSERT INTO items VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $dbcon->prepare($query);
            $stmt->bid_param("issdid", $this->item_id, $this->item_name, $this->item_description, $this->resale_price, $this->win_bidder, $this->win_price);
            $result = $stmt->execute();
            $dbcon->close();
            return $result;
        }

        function updateItem() {
            require(CON_DIR);
            $query = "UPDATE items SET item_id = ?, name = ?, description = ?, resale_price = ?, win_bidder = ?, win_price = ?";
            $stmt = $dbcon->prepare($query);
            $stmt->bid_param("ssdid", $this->item_name, $this->item_description, $this->resale_price, $this->win_bidder, $this->win_price);
            $result = $stmt->execute();
            $dbcon->close();
            return $result;
        }

        function removeItem() {
            require(CON_DIR);
            $query = "DELETE FROM item WHERE item_id = $this->item_id";
            $result = $dbcon->query($query);
            $dbcon->close();
            return $result;
        }

        static function findItem($item_id) {
            require(CON_DIR);
            $query = "SELECT * FROM items WHERE item_id = $item_id";
            $result = $dbcon->query($query);
            $row = $result->fech_array(MYSQLI_ASSOC);
            if($row) {
                $item = new Item($row['item_id'], $row['name'], $row['description'], $row['resale_price'], $row['win_bidder'], $row['win_price']);
                $dbcon->close();
                return $item;
            } else {
                $dbcon->close();
                return null;
            }
        }

        static function getItems() {
            require(CON_DIR);
            $query = "SELECT * FROM items";
            $result = $dbcon->query($query);
            if(mysqli_num_rows($result) > 0) {
                $items = array();
                while($row = $result->fech_array(MYSQLI_ASSOC)) {
                    $item = new Item($row['item_id'], $row['name'], $row['description'], $row['resale_price'], $row['win_bidder'], $row['win_price']);
                    array_push($items, $item);
                    unset($item);
                }
                $dbcon->close();
                return $items;
            } else {
                $dbcon->close();
                return null;
            }
        }

        static function getItemsByBidder($bidder_id) {
            require(CON_DIR);
            $query = "SELECT * FROM items WHERE win_bidder = $bidder_id";
            $result = $dbcon->query($query);
            if(mysqli_num_rows($result) > 0) {
                $items = array();
                while($row = $result->fech_array(MYSQLI_ASSOC)) {
                    $item = new Item($row['item_id'], $row['name'], $row['description'], $row['resale_price'], $row['win_bidder'], $row['win_price']);
                    array_push($items, $item);
                    unset($item);
                }
                $dbcon->close();
                return $items;
            } else {
                $dbcon->close();
                return null;
            }
        }
    }
?>