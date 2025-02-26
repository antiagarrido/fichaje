# fichaje

<!-- 
CREATE DATABASE IF NOT EXISTS sistema_fichaje;
CREATE USER IF NOT EXISTS 'super'@'%' IDENTIFIED BY '1234';
GRANT ALL PRIVILEGES ON sistema_fichaje.* TO 'super'@'%';
USE sistema_fichaje;

CREATE TABLE usuarios (
    id_usu INT(3) PRIMARY KEY AUTO_INCREMENT,
    tipo_usu VARCHAR(1) NOT NULL,
    nom_usu VARCHAR(20) NOT NULL,
    ape_usu VARCHAR(50) NOT NULL,
    email_usu VARCHAR(50) NOT NULL,
    pass_usu VARCHAR(100) NOT NULL,
    dni_usu VARCHAR(15) NOT NULL
);

CREATE TABLE fichajes (
    id_fic INT(6) PRIMARY KEY AUTO_INCREMENT,
    tipo_fic VARCHAR(1) NOT NULL,
    id_usu INT(3) NOT NULL,
    fecha_fic DATE NOT NULL,
    hora_fic TIME NOT NULL,
    activo_fic INT(1) NOT NULL,
    token_fic VARCHAR(50) NOT NULL,
    FOREIGN KEY (id_usu) REFERENCES usuarios(id_usu)
);

ALTER TABLE usuarios ADD CONSTRAINT unique_dni UNIQUE (dni_usu);

INSERT INTO usuarios(tipo_usu, nom_usu, ape_usu, email_usu, pass_usu, dni_usu) VALUES (
    2,'admin','admin', 'admin@fichaje.com','1234','000000A'); -->