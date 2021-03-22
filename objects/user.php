<?php 

class UserWebshop {

    private $db_connection; 
    private $user_id; 
    private $username; 
    private $user_email; 
    private $user_password; 
    private $product_id; 
    private $product_name; 
    private $product_description; 
    private $product_price; 

    
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
            echo "Could not execute query 'CreateUser', please try again!"; 
            die(); 
        }

        //Counts and checks if there is a user with the same username or password. 
        $count_rows = $statement->rowCount();
        if($count_rows > 0) {
            echo "The username or email already exists!";
            die();  
        }

        $password = $_POST['password']; 
        $salt1 = "AfGsaö2";
        $salt2 = "Hasf&6";
        $krypt_password = md5($salt2.$password.$salt1);

        try {
            $sql = "INSERT INTO users (username, email, password) VALUES (:username_IN, :email_IN, :password_IN)";
            $statement = $this->db_connection->prepare($sql); 
            $statement->bindParam(":username_IN", $username_IN); 
            $statement->bindParam(":email_IN", $user_email_IN); 
            $statement->bindParam(":password_IN", $krypt_password); 

        } catch(PDOException $error_message) {
            echo $error_message->getMessage(); 
        }

        if (!$statement->execute()) {
            echo "Could not create user, try again!"; 
            die(); 
        }
        $this->username = $username_IN; 
        $this->email = $user_email_IN; 

        echo "User successfully created!<br/> Username: $this->username Email: $this->email"; 
        die(); 

    } else {
        $error = new stdClass();
        $error->message = "All arguments need a value!"; 
        $error->code = "001"; 
        print_r(json_encode($error)); 
        die();  

    }
}

    function AddProduct($product_name_IN, $product_description_IN, $product_price_IN) {
        if (!empty($product_name_IN) && !empty($product_description_IN)) {
            
        $sql = "SELECT productId FROM products WHERE productName=:productName_IN OR description=:description_IN"; 
        $statement = $this->db_connection->prepare($sql); 
        $statement->bindParam(":productName_IN", $product_name_IN); 
        $statement->bindParam(":description_IN", $product_description_IN); 
        //$statement->bindParam(":price_IN", $product_price_IN); 

        if (!$statement->execute()) {
            echo "Could not execute query 'AddProduct', please try again!"; 
            die(); 
        }

        //Counts and checks if there is a product with the same productname. 
        $count_rows = $statement->rowCount();
        if($count_rows > 0) {
            echo "The product already exists!";
            die();  
        }

        try {
            $sql = "INSERT INTO products (productName, description, price) VALUES (:productName_IN, :description_IN, :price_IN)";
            $statement = $this->db_connection->prepare($sql); 
            $statement->bindParam(":productName_IN", $product_name_IN); 
            $statement->bindParam(":description_IN", $product_description_IN); 
            $statement->bindParam(":price_IN", $product_price_IN); 

        } catch(PDOException $error_message) {
            echo $error_message->getMessage(); 
        }

        if (!$statement->execute()) {
            echo "Could not create product, try again!"; 
            die(); 
        }
        $this->productName = $product_name_IN; 
        $this->price = $product_price_IN; 

        echo "Product successfully created!<br/> Product Name: $this->productName Price: $this->price"; 
        die(); 

    } else {
        $error = new stdClass();
        $error->message = "All arguments need a value!"; 
        $error->code = "002"; 
        print_r(json_encode($error)); 
        die();  

    }

}

    function DeleteProduct($product_id) {
        $sql = "DELETE FROM products WHERE productId=:product_id_IN"; 
        $statement = $this->db_connection->prepare($sql); 
        $statement->bindParam("product_id_IN", $product_id); 
        $statement->execute(); 

        $message = new stdClass(); 
        if ($statement->rowCount() > 0 ) {
            $message->text = "Product with productID: $product_id is deleted!";
            return $message;  

        }
        $message->return = "Error, no product with productID: $product_id exsists."; 
        return $message; 
        
     }


     function GetAllProducts() {
         $sql = "SELECT * FROM products"; 
         $statement = $this->db_connection->prepare($sql); 
         $statement->execute();
         return $statement->fetchAll(); 
     }

     function GetProduct($product_id) {
         $sql = "SELECT productId, productName, description, price FROM products WHERE productId=:product_id_IN";
         $statement = $this->db_connection->prepare($sql); 
         $statement->bindParam(":product_id_IN", $product_id);

         if ( !$statement->execute()) {
             $error = new stdClass();
             $error->message = "Product dosent exsist!"; 
             $error->code = "004"; 
             print_r(json_encode($error)); 
             die(); 
         }
         $row = $statement->fetch(); 

         $this->product_id = $row['productId']; 
         $this->product_name = $row['productName']; 
         $this->product_description = $row['description']; 

         return $row; 
     }




}

?> 