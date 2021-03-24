# REST API-Webshop

       {
            "REST_API by: ": "Agnes-Cecilia Bergqvist",
            "Github": "https://github.com/Agnes-CeciliaBergqvist",
            "Contact": "agnes-cecilia.bergqvist@medieinstitutet.se"
            }


SQL-question to create the database 

DROP DATABASE IF EXISTS Webshop; 
CREATE DATABASE Webshop;

DROP TABLE IF EXISTS cart; 
DROP TABLE IF EXISTS products; 
DROP TABLE IF EXISTS users;

CREATE TABLE users (userId INT NOT NULL PRIMARY KEY AUTO_INCREMENT, username VARCHAR(40) NOT NULL, password VARCHAR(100) NOT NULL, email VARCHAR(150)) ENGINE = InnoDB; 
CREATE TABLE products (productId INT NOT NULL PRIMARY KEY AUTO_INCREMENT, productName VARCHAR(200), description VARCHAR(400), price INT) ENGINE = InnoDB; 
CREATE TABLE cart (cartId INT NOT NULL PRIMARY KEY AUTO_INCREMENT, productId INT NOT NULL,  CONSTRAINT FKproductsId FOREIGN KEY(productId) REFERENCES products(productId)) ENGINE = InnoDB; 


***********
All functions are written with big letters. 
Using try and catch for every sql questions 

OBS!!! SE TILL SÅ DU FÖLJER REGLER MED print_r och return!! 


ERROR CODES
------
001 = All arguments need a value "CreateUser" 
002 = All arguments need a value "AddProduct" 
003 = No ID specified, enter the ID that you want to delete "deleteProduct", "getProduct"
004 = Product dosent exsist! "GetProduct"
400 =  Bad Request



     
