CREATE DATABASE lol;

CREATE TABLE champ(
	id INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255),
    rol ENUM("Asesino","Luchador","Tirado","Mago","Soporte","Tanque"),
    dificultad ENUM("Baja","Moderada","Alta"),
    `description` TEXT
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO champ VALUES(0,"AURELION SOL","Mago","Moderada","dsdsdsddsdsdsd.");
INSERT INTO champ VALUES(0,"BLITZCRANK","Tanque","Moderada","sdsdsdsdsd");
INSERT INTO champ VALUES(0,"CASSIOPEIA","Mago","Alta","sdsdssddsds.");
INSERT INTO champ VALUES(0,"DR. MUNDO","Luchador","Moderada","dfdfdfdfdfddff");
INSERT INTO champ VALUES(0,"Talon","Asesino","Moderada","dfdfdfdfddfddff.");

 