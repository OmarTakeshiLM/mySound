-- CREATE DATABASE b5ojcad;

USE b5ojcad;

DROP TABLE IF EXISTS u5lwe5a;								/*TABLA usuario*/
CREATE TABLE u5lwe5a (
  u5wkx0 VARCHAR(64) COLLATE utf8_spanish_ci NOT NULL,			/*nombre_artístico id_usuario*/
  u5hwo4 VARCHAR(64) COLLATE utf8_spanish_ci NOT NULL,			/*nombre_usuario*/
  u5nbf8 VARCHAR(256) COLLATE utf8_spanish_ci NOT NULL,			/*contraseña*/
  u5asd4 VARCHAR(128) COLLATE utf8_spanish_ci NOT NULL,			/*correo*/
  u5pyt0 VARCHAR(64) COLLATE utf8_spanish_ci NOT NULL,			/*género*/
  u5rem2 VARCHAR(256) COLLATE utf8_spanish_ci DEFAULT NULL,		/*biografía*/
  u5ybn4 VARCHAR(64) COLLATE utf8_spanish_ci NOT NULL,			/*nacionalidad*/
  
  PRIMARY KEY (u5wkx0)
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE IF EXISTS t5fjs0w;								/*TABLA track*/
CREATE TABLE t5fjs0w (
  t5isk2 INT NOT NULL AUTO_INCREMENT,							/*id_track*/
  t5qwd7 VARCHAR(64) COLLATE utf8_spanish_ci NOT NULL,											/*id_usuario*/
  t5prc4 VARCHAR(128) COLLATE utf8_spanish_ci NOT NULL,			/*nombre_track*/
  t5jsi8 FLOAT DEFAULT NULL,									/*valoración*/
  t5iwj7 FLOAT NOT NULL,										/*duración*/
  t5tlc3 VARCHAR(64) COLLATE utf8_spanish_ci NOT NULL,			/*ruta*/
  t5jds0 VARCHAR(64) COLLATE utf8_spanish_ci NOT NULL,
  t5zpw1 VARCHAR(64) COLLATE utf8_spanish_ci NOT NULL,
  t5oin7 TEXT COLLATE utf8_spanish_ci NULL,
  -- t5isk2,t5qwd7,t5prc4,t5jsi8,t5iwj7,t5tlc3,t5jds0,t5zpw1,t5oin7
  
  PRIMARY KEY (t5isk2),
  CONSTRAINT restricc1 FOREIGN KEY (t5qwd7) REFERENCES u5lwe5a(u5wkx0) ON DELETE CASCADE ON UPDATE CASCADE
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



DROP TABLE IF EXISTS p5trp7m;								/*TABLA playlist*/							
CREATE TABLE p5trp7m (
  p5lqm5 INT NOT NULL AUTO_INCREMENT,											/*id_playlist*/
  p5uss6 VARCHAR(64) COLLATE utf8_spanish_ci NOT NULL,			/*nombre_playlist*/
  p5mso3 INT NOT NULL,											/*id_track*/
  p5wnq8 VARCHAR(64) COLLATE utf8_spanish_ci NOT NULL,											/*id_usuario*/
  

  PRIMARY KEY (p5lqm5),
  CONSTRAINT restricc2 FOREIGN KEY (p5wnq8) REFERENCES u5lwe5a(u5wkx0) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT restricc3 FOREIGN KEY (p5mso3) REFERENCES t5fjs0w(t5isk2) ON DELETE CASCADE ON UPDATE CASCADE
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



DROP TABLE IF EXISTS g5jad9j;								/*TABLA gustos*/							
CREATE TABLE g5jad9j (
  g5rjc6 VARCHAR(64) COLLATE utf8_spanish_ci NOT NULL,											/*id_usuario*/
  g5pio7 VARCHAR(64) COLLATE utf8_spanish_ci NOT NULL,			/*gusto*/

  CONSTRAINT restricc4 FOREIGN KEY (g5rjc6) REFERENCES u5lwe5a(u5wkx0) ON DELETE CASCADE ON UPDATE CASCADE
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



DROP TABLE IF EXISTS h5rkj3z;								/*TABLA historial*/							
CREATE TABLE h5rkj3z (
  h5ema0 VARCHAR(64) COLLATE utf8_spanish_ci NOT NULL,											/*id_usuario*/
  h5qlj2 INT NOT NULL,											/*id_track*/

  CONSTRAINT restricc5 FOREIGN KEY (h5ema0) REFERENCES u5lwe5a(u5wkx0) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT restricc6 FOREIGN KEY (h5qlj2) REFERENCES t5fjs0w(t5isk2) ON DELETE CASCADE ON UPDATE CASCADE
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



DROP TABLE IF EXISTS c5oft0s;								/*TABLA clasificación*/							
CREATE TABLE c5oft0s (
  c5fhb4 INT NOT NULL,											/*id_track*/
  c5krx3 VARCHAR(64) COLLATE utf8_spanish_ci NOT NULL,			/*tipo_track*/       /*(música,audiolibro,podcast,etc)*/
  c5pio7 VARCHAR(64) COLLATE utf8_spanish_ci NOT NULL,			/*género_track*/     /*(género dependerá del tipo de track <control INTerno>)*/  
  
  CONSTRAINT restricc7 FOREIGN KEY (c5fhb4) REFERENCES t5fjs0w(t5isk2) ON DELETE CASCADE ON UPDATE CASCADE
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
