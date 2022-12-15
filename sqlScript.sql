DROP DATABASE IF EXISTS lol;
CREATE DATABASE lol CHARACTER SET utf8mb4;
USE lol;

CREATE TABLE champ (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(100) NOT NULL,
rol VARCHAR(100) NOT NULL,
dificultad VARCHAR(100) NOT NULL,
descripcion VARCHAR(100) NOT NULL
);

#Insertar INFO
INSERT INTO champ VALUES(2, 'Akali', 'Asesino', 'Moderada', ' Akali actúa ahora en solitario y está lista para convertirse en el arma mortal');
INSERT INTO champ VALUES(3, 'Anivia', 'Mago', 'Alta', 'Un pajaro Feo');
INSERT INTO champ VALUES(4, 'Bardo', 'Apoyo', 'Alta', 'Que feo eres');
INSERT INTO champ VALUES(5, 'Fizz', 'Asesino', 'Moderada', 'Una lagartija con un palo');