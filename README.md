# API-Webshop

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


ERROR CODES
------
001 = All arguments need a value "CreateUser" 
002 = All arguments need a value "AddProduct" 