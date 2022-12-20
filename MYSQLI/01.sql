DROP DATABASE IF EXISTS lol;
CREATE DATABASE lol CHARACTER SET utf8mb4;
USE lol;

CREATE TABLE champ (
id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(100) NOT NULL,
rol ENUM('Asesino', 'Mago', 'Apoyo') NOT NULL,
difficulty ENUM('Baja', 'Moderada', 'Alta') NOT NULL,
`description` text(250) NOT NULL
);

#Insertar INFO
INSERT INTO champ VALUES(2, 'Akali', 'Asesino', 'Moderada', ' Akali actúa ahora en solitario y está lista para convertirse en el arma mortal');
INSERT INTO champ VALUES(3, 'Anivia', 'Mago', 'Alta', 'Un pajaro Feo');
INSERT INTO champ VALUES(4, 'Bardo', 'Apoyo', 'Alta', 'Que feo eres');
INSERT INTO champ VALUES(5, 'Fizz', 'Asesino', 'Moderada', 'Una lagartija con un palo');