<?php 

class UserWebshop {

    private $db_connection; 
    private $user_id; 
    private $username; 
    private $user_email; 
    private $user_password; 

    
    function __construct($db) {
        $this->db_connection = $db; 
    }

    function CreateUser($username_IN, $user_email_IN, $user_password_IN) {
        if (!empty($username_IN) && !empty($user_email_IN) && !empty($user_password_IN)) {
            
        $sql = "SELECT userId FROM users WHERE username=:username_IN OR email=:email_IN"; 
        $statement = $this->db_connection->prepare($sql); 
        $statement->bindParam(":username_IN", $username_IN); 
        $statement->bindParam(":email_IN", $user_email_IN); 

        if (!$statement->execute()) {
            echo "Could not execute query 'CreateUser', please try again"; 
            die(); 
        }

        //Counts and checks if there is a user with the same username or password. 
        $count_rows = $statement->rowCount();
        if($count_rows > 0) {
            echo "The username or email already exists";
            die();  
        }

        try {
            $sql = "INSERT INTO users (username, email, password) VALUES (:username_IN, :email_IN, :password_IN)";
            $statement = $this->db_connection->prepare($sql); 
            $statement->bindParam(":username_IN", $username_IN); 
            $statement->bindParam(":email_IN", $user_email_IN); 
            $statement->bindParam(":password_IN", $user_password_IN); 

        } catch(PDOException $error_message) {
            echo $error_message->getMessage(); 
        }

        if (!$statement->execute()) {
            echo "Could not create user, try again"; 
            die(); 
        }
        $this->username = $username_IN; 
        $this->email = $user_email_IN; 

        echo "User successfully created! Username: $this->username Email: $this->user_email"; 
        die(); 

    } else {
        $error = new stdClass();
        $error->message = "All arguments need a value"; 
        $error->code = "001"; 
        print_r(json_encode($error)); 
        die();  

    }

}




}

?> 