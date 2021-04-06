# REST API-Webshop

       {
      "REST_API by: ": "Agnes-Cecilia Bergqvist",
      "Github": "https://github.com/Agnes-CeciliaBergqvist",
      "Contact": "agnes-cecilia.bergqvist@medieinstitutet.se"
      }

All functions are written with big letters. 
Using try and catch for every sql question. 

* To be able to use these endpoints you need to be logged in to be able to create and product but you dont need to be a user to add products to the cart, you can be loggend in or not, you decide. But first of all you need to create my database SQL-question that you see below.
* When the database is created you can go to V1/users -> createUser.php and create the user by entering the username, email and password. 
* To login you will go to localhost/API-Webshop/V1/users/loginUser.php and enter the username and password that you just created. 
* To created a new product go to V1/users -> addProduct.php and enter product name, description and price. 
* After creating a product you can see all products if you want by going to localhost/API-Webshop/V1/users/getAllproduts.php or change the file name to what you want to do or see. 
* For exampel if you want to see one product, delete product, update product, add product in cart, see cart, delete cart and so on. 

*****************************************


ERROR CODES
Using error codes from https://httpstatuses.com/
-------------------------------------------------
400 =  Bad Request
401 = Unauthorized
404 = Not Found

*************************************

SQL-question to create the database 
-----------------------------------


DROP DATABASE IF EXISTS Webshop; 
CREATE DATABASE Webshop;

DROP TABLE IF EXISTS sessions; 
DROP TABLE IF EXISTS cart; 
DROP TABLE IF EXISTS products; 
DROP TABLE IF EXISTS users;

CREATE TABLE users (userId INT NOT NULL PRIMARY KEY AUTO_INCREMENT, username VARCHAR(40) NOT NULL, password VARCHAR(100) NOT NULL, email VARCHAR(150)) ENGINE = InnoDB; 
CREATE TABLE products (productId INT NOT NULL PRIMARY KEY AUTO_INCREMENT, productName VARCHAR(200), description VARCHAR(400), price INT) ENGINE = InnoDB; 
CREATE TABLE cart (cartId INT NOT NULL PRIMARY KEY AUTO_INCREMENT, productId INT NOT NULL, cartToken VARCHAR(255), CONSTRAINT FKproductsId FOREIGN KEY(productId) REFERENCES products(productId)) ENGINE = InnoDB; 
CREATE TABLE sessions (sessionId INT NOT NULL PRIMARY KEY AUTO_INCREMENT, userId INT NOT NULL, token text, last_used DATETIME, CONSTRAINT FKusersId FOREIGN KEY(userId) REFERENCES users(userId)) ENGINE = InnoDB; 

*******************************************
     
