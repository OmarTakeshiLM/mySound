CREATE DATABASE b5ojcad;

USE b5ojcad;

DROP TABLE IF EXISTS u5lwe5a;								/*TABLA usuario*/
CREATE TABLE u5lwe5a (
  u5wkx0 int NOT NULL AUTO_INCREMENT,							/*id_usuario*/
  u5hwo4 varchar(64) COLLATE utf8_spanish_ci NOT NULL,			/*nombre_usuario*/
  u5nbf8 varchar(256) COLLATE utf8_spanish_ci NOT NULL,			/*contraseña*/
  u5asd4 varchar(128) COLLATE utf8_spanish_ci NOT NULL,			/*correo*/
  u5pyt0 varchar(64) COLLATE utf8_spanish_ci NOT NULL,			/*género*/
  u5rem2 varchar(256) COLLATE utf8_spanish_ci DEFAULT NULL,		/*biografía*/
  u5ybn4 varchar(64) COLLATE utf8_spanish_ci NOT NULL,			/*nacionalidad*/
  
  PRIMARY KEY (u5wkx0)
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE IF EXISTS t5fjs0w;								/*TABLA track*/
CREATE TABLE t5fjs0w (
  t5isk2 int NOT NULL AUTO_INCREMENT,							/*id_track*/
  t5qwd7 int NOT NULL,											/*id_usuario(autor)*/
  t5prc4 varchar(128) COLLATE utf8_spanish_ci NOT NULL,			/*nombre_track*/
  t5jsi8 float DEFAULT NULL,									/*valoración*/
  t5slq1 int DEFAULT 0,                       /*Num valoreaciones*/
  t5iwj7 float NOT NULL,										/*duración*/
  t5tlc3 varchar(256) COLLATE utf8_spanish_ci NOT NULL,			/*audio*/
  t5jds0 varchar(256) COLLATE utf8_spanish_ci NOT NULL, /* portada */
  t5zpw1 varchar(30) COLLATE utf8_spanish_ci NOT NULL, /* genero */
  t5oin7 varchar(256) COLLATE utf8_spanish_ci NOT NULL, /* descripcion */
  
  PRIMARY KEY (t5isk2),
  CONSTRAINT restricc1 FOREIGN KEY (t5qwd7) REFERENCES u5lwe5a(u5wkx0) ON DELETE CASCADE ON UPDATE CASCADE
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



DROP TABLE IF EXISTS p5trp7m;								/*TABLA playlist*/							
CREATE TABLE p5trp7m (
  p5lqm5 int NOT NULL AUTO_INCREMENT,							/*id_playlist*/
  p5wnq8 int NOT NULL,											/*id_usuario*/
  p5mso3 int NOT NULL,											/*id_track*/
  p5uss6 VARCHAR(64) COLLATE utf8_spanish_ci NOT NULL,			/*nombre_playlist*/

  PRIMARY KEY (p5lqm5),
  CONSTRAINT restricc2 FOREIGN KEY (p5wnq8) REFERENCES u5lwe5a(u5wkx0) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT restricc3 FOREIGN KEY (p5mso3) REFERENCES t5fjs0w(t5isk2) ON DELETE CASCADE ON UPDATE CASCADE
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



DROP TABLE IF EXISTS g5jad9j;								/*TABLA gustos*/							
CREATE TABLE g5jad9j (
  g5rjc6 int NOT NULL,											/*id_usuario*/
  g5pio7 VARCHAR(64) COLLATE utf8_spanish_ci NOT NULL,		/*gusto*/

  CONSTRAINT restricc4 FOREIGN KEY (g5rjc6) REFERENCES u5lwe5a(u5wkx0) ON DELETE CASCADE ON UPDATE CASCADE
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



DROP TABLE IF EXISTS h5rkj3z;								/*TABLA historial*/							
CREATE TABLE h5rkj3z (
  h5ema0 int NOT NULL,											/*id_usuario*/
  h5qlj2 int NOT NULL,											/*id_track*/

  CONSTRAINT restricc5 FOREIGN KEY (h5ema0) REFERENCES u5lwe5a(u5wkx0) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT restricc6 FOREIGN KEY (h5qlj2) REFERENCES t5fjs0w(t5isk2) ON DELETE CASCADE ON UPDATE CASCADE
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



DROP TABLE IF EXISTS c5oft0s;								/*TABLA clasificación*/							
CREATE TABLE c5oft0s (
  c5fhb4 int NOT NULL,											/*id_track*/
  c5krx3 VARCHAR(64) COLLATE utf8_spanish_ci NOT NULL,			/*tipo_track*/       /*(música,audiolibro,podcast,etc)*/
  c5pio7 VARCHAR(64) COLLATE utf8_spanish_ci NOT NULL,			/*género_track*/     /*(género dependerá del tipo de track <control interno>)*/  
  
  CONSTRAINT restricc7 FOREIGN KEY (c5fhb4) REFERENCES t5fjs0w(t5isk2) ON DELETE CASCADE ON UPDATE CASCADE
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
