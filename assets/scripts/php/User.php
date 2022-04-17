<?php


class User {
    
    public $user_name;
    public $first_name;
    public $last_name;
    public $email;
    public $phone_number;
    public $password;



    //The constructor for the class
    function __construct($user_name, $first_name, $last_name, $email, $phone_number, $password) {
        $this->user_name = $user_name;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone_number = $phone_number;
        $this->password = $password;
    }

    //displays de bidder info
    function __toString() {
        $output = "<h3>$this->first_name $this->last_name ({$_SESSION['login']})</h3>\n" .
                    "<p>Contacto: $this->phone_number<p>\n";
        return $output;
    }


    //register the user
    function saveUser() {
        require(dirname(__FILE__) . '/db_connection/connect.php');
        $query = "INSERT INTO users VALUES (?, ?, ?, ?, ?, SHA2(?, 256))";
        $stmt = $dbcon->prepare($query);
        $stmt->bind_param("ssssis", $this->user_name, $this->first_name, $this->last_name, $this->email, $this->phone_number, $this->password);
        $result = $stmt->execute();
        $dbcon->close();
        return $result;
    }

    //updates the user's info in the DB
    function updateUser() {
        require(dirname(__FILE__) . '/db_connection/connect.php');
        $query = "UPDATE user SET user_name = ?, first_name = ?,  last_name = ?, email = ?, phone_number = ?";
        $stmt = $dbcon->prepare($query);
        $stmt->bind_param("ssssi", $this->user_name, $this->first_name, $this->last_name, $this->email, $this->phone_number);
        $result = $stmt->execute();
        $dbcon->close();
        return $result;
    }

    //remove the bidder info from the DB
    function removeUser() {
        require(dirname(__FILE__) . '/db_connection/connect.php');
        $query = "DELETE FROM users WHERE user_name = $this->user_name";
        $result = $dbcon->query($query);
        $dbcon->close();
        return $result;
    }

    //get the list of all users in the database
    static function getUsers() {
        require(dirname(__FILE__) . '/db_connection/connect.php');
        $query = "SELECT * FROM users";
        $result = $dbcon->query($query);
        if(mysqli_num_rows($result) > 0) {
            $users = array();
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $user = new User($row['user_name'], $row['first_name'], $row['last_name'], $row['email'], $row['phone_number']);
                array_push($users, $user);
                unset($user);
            }
            $dbcon->close();
            return $users;
        } else {
            $dbcon->close();
            return NULL;
        }
    }


    //finds a especific user based on his username
    static function findUser($user_name) {
        require(dirname(__FILE__) . '/db_connection/connect.php');
        $query = "SELECT * FROM users WHERE user_name = '$user_name'";
        $result = $dbcon->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if($row) {
            $user = new User($row['user_name'], $row['first_name'], $row['last_name'], $row['email'], $row['phone_number'], $row['phone_number']);
            $dbcon->close();
            return $user;
        } else {
            $dbcon->close();
            return NULL;
        }

    }

}
?>