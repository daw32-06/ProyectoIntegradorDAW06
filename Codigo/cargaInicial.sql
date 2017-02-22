-- Script creado por Pablo Mora Martín--

-- Base de datos a usar
USE DAW2xx_iniciales;

INSERT INTO usuario(codUsuario,email,nombre,apellidos,password,estatura,peso,fechaNac,tipoCorredor,sexo,medioFondo5km,medioFondo10km,medioFondoMediaMaraton,fondoMediaMaraton,trailCarreraMaxKm,trailDistancia,trailDesnivel)VALUES
('heraclio','heraclio@gmail.com','heraclio','borbujo',SHA2('paso',256),185,80,'1969-02-01','casual','h',2,2,3,4,4,'trailPrueba',30,10000);

INSERT INTO track(idTrack,codUsuario,visibilidad,nombre,comentario,fechaImportacion,fechaInicio) VALUES
(NULL,'heraclio',true,'Subida peña trevinca','soy programador suyefgyjfg','2017-02-22','2017-02-22');

INSERT INTO trackpoint() VALUES
(NULL,1,42.0016873,-5.6802475,2000,180,1920,2,3,100),
(NULL,1,41.9976764,-5.6783772,2000,180,1920,2,3,100),
(NULL,1,41.9958127,-5.6785077,2000,180,1920,2,3,100);


