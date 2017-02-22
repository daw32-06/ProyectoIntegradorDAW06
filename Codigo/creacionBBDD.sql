DROP SCHEMA IF EXISTS DAW2xx_iniciales;
CREATE DATABASE DAW2xx_iniciales DEFAULT COLLATE utf8_unicode_ci;
USE DAW2xx_iniciales;
CREATE TABLE IF NOT EXISTS usuario (
	codUsuario VARCHAR(15) COLLATE utf8_spanish_ci PRIMARY KEY,
	email VARCHAR(50) COLLATE utf8_spanish_ci UNIQUE,
	nombre VARCHAR(40) COLLATE utf8_spanish_ci,
	apellidos VARCHAR(60) COLLATE utf8_spanish_ci,
	password VARCHAR(64) COLLATE utf8_spanish_ci,
	estatura INT(3),
	peso INT(3),
	fechaNac VARCHAR(11) COLLATE utf8_spanish_ci,
	tipoCorredor VARCHAR(11) COLLATE utf8_spanish_ci,
	sexo VARCHAR(1) COLLATE utf8_spanish_ci,
	medioFondo5km INT(5),
	medioFondo10km INT(5),
	medioFondoMediaMaraton INT(5),
	fondoMediaMaraton INT(5),
	fondoMaraton INT(5),
	trailNombre VARCHAR(50) COLLATE utf8_spanish_ci,
	trailDistancia INT(5),
	trailDesnivel INT(5)
)ENGINE=INNODB COLLATE utf8_unicode_ci;
CREATE TABLE IF NOT EXISTS track(
	idTrack int AUTO_INCREMENT PRIMARY KEY,
	codUsuario VARCHAR(15) COLLATE utf8_spanish_ci,
	visibilidad BOOLEAN,
	nombre VARCHAR(100) COLLATE utf8_spanish_ci,
	comentario VARCHAR(255) COLLATE utf8_spanish_ci,
	fechaImportacion VARCHAR(11) COLLATE utf8_spanish_ci,
	fechaInicio VARCHAR(11) COLLATE utf8_spanish_ci,
	FOREIGN KEY (codUsuario) REFERENCES usuario(codUsuario) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=INNODB COLLATE utf8_unicode_ci;
CREATE TABLE IF NOT EXISTS trackpoint(
	idTrackpoint int AUTO_INCREMENT PRIMARY KEY,
	idTrack INT(255),
	latitud FLOAT,
	longitud FLOAT,
	tiempo INT(20),
	heartRateBPM INT(3),
	elevacion FLOAT,
	numSatelites INT(2),
	velocidad FLOAT,
	calorias FLOAT,
	FOREIGN KEY (idTrack) REFERENCES track(idTrack) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=INNODB COLLATE utf8_unicode_ci;