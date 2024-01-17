DROP DATABASE IF EXISTS sistem_eventos;
CREATE DATABASE IF NOT EXISTS sistem_eventos DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE sistem_eventos;

GRANT ALL PRIVILEGES ON sistem_eventos.* TO 'usuariosistem_eventos'@'localhost' IDENTIFIED BY 'usuariosistem_eventos123';

CREATE TABLE roles (
    id_rol INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    rol VARCHAR(50) NOT NULL
)ENGINE=InnoDB;

INSERT INTO roles VALUES(10,'Administrador');
INSERT INTO roles VALUES(20,'Oyente');

CREATE TABLE usuarios (
    id_usuario INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_usuario VARCHAR(90) NOT NULL,
    email_usuario VARCHAR(70) NOT NULL,
    genero TINYINT(1) NOT NULL DEFAULT 1 COMMENT '1 => Femenino, 2 => Masculino, 3 => Otro',
    id_rol INT(11) NOT NULL,
    FOREIGN KEY (id_rol) REFERENCES roles (id_rol) ON DELETE CASCADE ON UPDATE CASCADE 
)ENGINE=InnoDB;

INSERT INTO usuarios VALUES(NULL,'xd xd xd', SHA2("5brenxd@gmail.com",0), 3,20);
INSERT INTO usuarios VALUES(NULL,'Tomas Ezequiel Munoz Ramirez', SHA2("cec.tlaxcala.ipn@gmail.com",0), 2,10);


CREATE TABLE conferencia (
    id_conferencia INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_conferencia VARCHAR(90) NOT NULL,
    descripcion VARCHAR(100) DEFAULT NULL,
    fecha_conferencia date NOT NULL,
    hora_conferencia time NOT NULL,
    plantilla_imagen VARCHAR(100) NOT NULL
)ENGINE=InnoDB;

INSERT INTO conferencia VALUES(NULL,'Conferencia',NULL,"10-11-2023","10:00","reconocimiento.jpg");

CREATE TABLE oyent_conferen (
  id_usuario int(11) NOT NULL,
  id_conferencia int(11) NOT NULL,
  PRIMARY KEY (id_usuario,id_conferencia),
  FOREIGN KEY (id_usuario) REFERENCES usuarios (id_usuario) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_conferencia) REFERENCES conferencia (id_conferencia) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

INSERT INTO oyent_conferen VALUES(14,1);
