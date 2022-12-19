DROP DATABASE IF EXISTS lol;
CREATE DATABASE lol CHARACTER SET utf8mb4;
USE lol;

CREATE TABLE champ (
id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(100) NOT NULL,
rol ENUM('Asesino', 'Mago', 'Apoyo') NOT NULL,
difficulty VARCHAR(100) NOT NULL,
`description` text(250) NOT NULL
);

CREATE TABLE users (
id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(100) NOT NULL,
`password` varchar(200) NOT NULL ,
`email` varchar(100) NOT NULL,
`name` varchar(100) NOT NULL,
`username` varchar(100) NOT NULL
);