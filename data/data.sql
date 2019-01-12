DROP DATABASE IF EXISTS lner;
CREATE DATABASE lner;
use lner;

CREATE TABLE plantel(
  cod_dea VARCHAR(30) NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  dtto_esc VARCHAR(10) NOT NULL,
  direccion VARCHAR(200) NOT NULL,
  telefono VARCHAR(30) NULL,
  municipio VARCHAR(100) NOT NULL,
  ent_federal VARCHAR(100) NOT NULL,
  zona_educativa VARCHAR (100) NOT NULL,
  dir_zona VARCHAR(100) NOT NULL,
  ci_dz VARCHAR(30) NOT NULL,
  PRIMARy KEY(cod_dea)) ENGINE = InnoDB deFAULT CHARACTER SET = utf8;

INSERT INTO plantel VALUES
('S1357-N1404', 'LICEO NOCTURNO "EUTIMIO RIVAS"', '04', 'PROLONGACION SECTOR PUERTO RICO', '', 'ANTONIO PINTO SALINAS', 'MERIDA', 'MERIDA', 'Nelson Ruiz', 'N/D');

CREATE TABLE  plan_estudio(
  planestudio VARCHAR(200) NOT NULL,
  planestudioG VARCHAR(200) NOT NULL,
  codigo VARCHAR(20) NOT NULL,
  codigoG VARCHAR(20) NOT NULL,
  mencion VARCHAR(200) NOT NULL,
  mencionG VARCHAR(200) NOT NULL,
  cod_dea VARCHAR(30) NOT NULL,
  iniP DATE NOT NULL,
  endP DATE NOT NULL,
  FOREIGN KEY(cod_dea) REFERENCES plantel(cod_dea) ON UPDATE CASCADE ON DELETE CASCADE,
  PRIMARy KEY(codigo)) ENGINE = InnoDB deFAULT CHARACTER SET = utf8;

INSERT INTO plan_estudio VALUES
('II ETAPA de Educacion BASICA de ADULTOS', 'Educacion MEDIA General', '32012', '31022', '******', 'CIENCIAS', 'S1357-N1404', '2017-09-18', '2018-02-12');

CREATE TABLE alumnos (
  ci VARCHAR (30) NOT NULL,
  UNIQUE(ci),
  fnacimiento DATE NOT NULL,
  apellidos VARCHAR (100) NOT NULL,
  nombres VARCHAR (100) NOT NULL,
  lugar_nacimiento VARCHAR (200) NOT NULL,
  ent_federal_pais VARCHAR (100) NOT NULL,
  cod_dea VARCHAR(30) NOT NULL,
  FOREIGN KEY(cod_dea) REFERENCES plantel(cod_dea) ON UPDATE CASCADE ON DELETE CASCADE,
  PRIMARy KEY(ci)) ENGINE = InnoDB deFAULT CHARACTER SET = utf8;

CREATE TABLE personal(
  id INT AUTO_INCREMENT NOT NULL,
  director VARCHAR (200) NOT NULL,
  ci_d VARCHAR(30) NOT NULL,
  PRIMARy KEY(id)) ENGINE = InnoDB deFAULT CHARACTER SET = utf8;

INSERT INTO personal VALUES(null, 'Lcdo. Noel José Álvarez Méndez', 'V-13.014.237');

CREATE TABLE semestres(
  id INT NOT NULL,
  semestre VARCHAR(20) NOT NULL,
  cod_dea VARCHAR(30) NOT NULL,
  FOREIGN KEY(cod_dea) REFERENCES plantel(cod_dea) ON UPDATE CASCADE ON DELETE CASCADE,
  PRIMARy KEY(id)) ENGINE = InnoDB deFAULT CHARACTER SET = utf8;

INSERT INTO semestres VALUES
  (1, 'Septimo', 'S1357-N1404'),
  (2, 'Octavo', 'S1357-N1404'),
  (3, 'Noveno', 'S1357-N1404'),
  (4, 'decimo', 'S1357-N1404'),
  (5, 'decimo Primero', 'S1357-N1404'),
  (6, 'decimo Segundo', 'S1357-N1404');

CREATE TABLE semestresG(
  id INT NOT NULL,
  semestre VARCHAR(20) NOT NULL,
  cod_dea VARCHAR(30) NOT NULL,
  FOREIGN KEY(cod_dea) REFERENCES plantel(cod_dea) ON UPDATE CASCADE ON DELETE CASCADE,
  PRIMARy KEY(id)) ENGINE = InnoDB deFAULT CHARACTER SET = utf8;

INSERT INTO semestresG VALUES
  (1, 'Primero', 'S1357-N1404'),
  (2, 'Segundo', 'S1357-N1404'),
  (3, 'Tercero', 'S1357-N1404'),
  (4, 'Cuarto', 'S1357-N1404');

CREATE TABLE semestresN(
  id INT NOT NULL,
  semestre VARCHAR(20) NOT NULL,
  cod_dea VARCHAR(30) NOT NULL,
  FOREIGN KEY(cod_dea) REFERENCES plantel(cod_dea) ON UPDATE CASCADE ON DELETE CASCADE,
  PRIMARy KEY(id)) ENGINE = InnoDB deFAULT CHARACTER SET = utf8;

INSERT INTO semestresN VALUES
  (1, 'Uno', 'S1357-N1404'),
  (2, 'Dos', 'S1357-N1404'),
  (3, 'Tres', 'S1357-N1404'),
  (4, 'Cuatro', 'S1357-N1404'),
  (5, 'Cinco', 'S1357-N1404'),
  (6, 'Seis', 'S1357-N1404');

CREATE TABLE asignaturas(
  id INT AUTO_INCREMENT NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  id_semestre INT NOT NULL,
  FOREIGN KEY(id_semestre) REFERENCES semestres(id) ON UPDATE CASCADE ON DELETE CASCADE,
  PRIMARy KEY(id)) ENGINE = InnoDB deFAULT CHARACTER SET = utf8;

INSERT INTO asignaturas VALUES
  (null, 'Castellano', 1),
  (null, 'Ingles', 1),
  (null, 'Matematica', 1),
  (null, 'Ciencias Biologicas', 1),
  (null, 'Geografia General', 1),
  (null, 'Educacion Familiar', 1),
  (null, 'Castellano', 2),
  (null, 'Ingles', 2),
  (null, 'Matematica', 2),
  (null, 'Ciencias Biologicas', 2),
  (null, 'Geografia General', 2),
  (null, 'Educacion Familiar', 2),
  (null, 'Castellano', 3),
  (null, 'Ingles', 3),
  (null, 'Matematica', 3),
  (null, 'Biologia', 3),
  (null, 'Historia de Venezuela', 3),
  (null, 'Educacion Artistica', 3),
  (null, 'Castellano', 4),
  (null, 'Ingles', 4),
  (null, 'Matematica', 4),
  (null, 'Biologia', 4),
  (null, 'Historia de Venezuela', 4),
  (null, 'Educacion Artistica', 4),
  (null, 'Castellano', 5),
  (null, 'Ingles', 5),
  (null, 'Matematica', 5),
  (null, 'Biologia', 5),
  (null, 'Fisica', 5),
  (null, 'Quimica', 5),
  (null, 'Historia Universal', 5),
  (null, 'Castellano', 6),
  (null, 'Ingles', 6),
  (null, 'Matematica', 6),
  (null, 'Biologia', 6),
  (null, 'Fisica', 6),
  (null, 'Quimica', 6),
  (null, 'Historia Universal', 6);

CREATE TABLE asignaturasG(
  id INT AUTO_INCREMENT NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  id_semestre INT NOT NULL,
  FOREIGN KEY(id_semestre) REFERENCES semestresG(id) ON UPDATE CASCADE ON DELETE CASCADE,
  PRIMARy KEY(id)) ENGINE = InnoDB deFAULT CHARACTER SET = utf8;

INSERT INTO asignaturasG VALUES
  (null, 'Castellano y Literatura', 1),
  (null, 'Matematica', 1),
  (null, 'Historia de Venezuela', 1),
  (null, 'Ingles', 1),
  (null, 'Filosofia', 1),
  (null, 'Fisica', 1),
  (null, 'Quimica', 1),
  (null, 'Biologia', 1),
  (null, 'Dibujo Tecnico', 1),
  (null, 'Premilitar', 1),
  (null, 'Castellano y Literatura', 2),
  (null, 'Matematica', 2),
  (null, 'Historia de Venezuela', 2),
  (null, 'Ingles', 2),
  (null, 'Filosofia', 2),
  (null, 'Fisica', 2),
  (null, 'Quimica', 2),
  (null, 'Biologia', 2),
  (null, 'Dibujo Tecnico', 2),
  (null, 'Premilitar', 2),
  (null, 'Castellano y Literatura', 3),
  (null, 'Matematica', 3),
  (null, 'Geografia de Venezuela', 3),
  (null, 'Ingles', 3),
  (null, 'Fisica', 3),
  (null, 'Quimica', 3),
  (null, 'Biologia', 3),
  (null, 'Cs de la Tierra', 3),
  (null, 'Premilitar', 3),
  (null, 'Castellano y Literatura', 4),
  (null, 'Matematica', 4),
  (null, 'Geografia de Venezuela', 4),
  (null, 'Ingles', 4),
  (null, 'Fisica', 4),
  (null, 'Quimica', 4),
  (null, 'Biologia', 4),
  (null, 'Cs de la Tierra', 4),
  (null, 'Premilitar', 4);

CREATE TABLE asignaturasN(
  id INT AUTO_INCREMENT NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  id_semestre INT NOT NULL,
  FOREIGN KEY(id_semestre) REFERENCES semestres(id) ON UPDATE CASCADE ON DELETE CASCADE,
  PRIMARy KEY(id)) ENGINE = InnoDB deFAULT CHARACTER SET = utf8;

INSERT INTO asignaturasN VALUES
  (null, 'Lengua Cultura y Comunicación', 1),
  (null, 'Matematica', 1),
  (null, 'Memoria Territorio y Cuidadania', 1),
  (null, 'Ciencias Naturales', 1),
  (null, 'Componente de Participación e Integración Comunitaria', 1),
  (null, 'Lengua Cultura y Comunicación', 2),
  (null, 'Matematica', 2),
  (null, 'Memoria Territorio y Cuidadania', 2),
  (null, 'Ciencias Naturales', 2),
  (null, 'Componente de Participación e Integración Comunitaria', 2),
  (null, 'Lengua Cultura y Comunicación', 3),
  (null, 'Matematica', 3),
  (null, 'Memoria Territorio y Cuidadania', 3),
  (null, 'Ciencias Naturales', 3),
  (null, 'Componente de Participación e Integración Comunitaria', 3),
  (null, 'Lengua Cultura y Comunicación', 4),
  (null, 'Matematica', 4),
  (null, 'Memoria Territorio y Cuidadania', 4),
  (null, 'Ciencias Naturales', 4),
  (null, 'Componente de Participación e Integración Comunitaria', 4),
  (null, 'Lengua Cultura y Comunicación', 5),
  (null, 'Matematica', 5),
  (null, 'Memoria Territorio y Cuidadania', 5),
  (null, 'Ciencias Naturales', 5),
  (null, 'Componente de Participación e Integración Comunitaria', 5),
  (null, 'Lengua Cultura y Comunicación', 6),
  (null, 'Matematica', 6),
  (null, 'Memoria Territorio y Cuidadania', 6),
  (null, 'Ciencias Naturales', 6),
  (null, 'Componente de Participación e Integración Comunitaria', 6);

CREATE TABLE asignaturasAll(
  id INT AUTO_INCREMENT NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  id_semestre INT NOT NULL,
  FOREIGN KEY(id_semestre) REFERENCES semestres(id) ON UPDATE CASCADE ON DELETE CASCADE,
  PRIMARy KEY(id)) ENGINE = InnoDB deFAULT CHARACTER SET = utf8;

INSERT INTO asignaturasAll VALUES
  (null, 'Castellano', 1),
  (null, 'Ingles', 1),
  (null, 'Matematica', 1),
  (null, 'Ciencias Biologicas', 1),
  (null, 'Geografia General', 1),
  (null, 'Educacion Familiar', 1),
  (null, 'Lengua Cultura y Comunicación', 1),
  (null, 'Memoria Territorio y Cuidadania', 1),
  (null, 'Ciencias Naturales', 1),
  (null, 'Componente de Participación e Integración Comunitaria', 1),
  (null, 'Castellano', 2),
  (null, 'Ingles', 2),
  (null, 'Matematica', 2),
  (null, 'Ciencias Biologicas', 2),
  (null, 'Geografia General', 2),
  (null, 'Educacion Familiar', 2),
  (null, 'Castellano y Literatura', 2),
  (null, 'Matematica', 2),
  (null, 'Historia de Venezuela', 2),
  (null, 'Filosofia', 2),
  (null, 'Fisica', 2),
  (null, 'Quimica', 2),
  (null, 'Biologia', 2),
  (null, 'Dibujo Tecnico', 2),
  (null, 'Premilitar', 2),
  (null, 'Lengua Cultura y Comunicación', 2),
  (null, 'Matematica', 2),
  (null, 'Memoria Territorio y Cuidadania', 2),
  (null, 'Ciencias Naturales', 2),
  (null, 'Componente de Participación e Integración Comunitaria', 2),
  (null, 'Castellano', 3),
  (null, 'Ingles', 3),
  (null, 'Matematica', 3),
  (null, 'Biologia', 3),
  (null, 'Historia de Venezuela', 3),
  (null, 'Educacion Artistica', 3),
  (null, 'Castellano y Literatura', 3),
  (null, 'Geografia de Venezuela', 3),
  (null, 'Fisica', 3),
  (null, 'Quimica', 3),
  (null, 'Cs de la Tierra', 3),
  (null, 'Premilitar', 3),
  (null, 'Lengua Cultura y Comunicación', 3),
  (null, 'Matematica', 3),
  (null, 'Memoria Territorio y Cuidadania', 3),
  (null, 'Ciencias Naturales', 3),
  (null, 'Componente de Participación e Integración Comunitaria', 3),
  (null, 'Castellano', 4),
  (null, 'Ingles', 4),
  (null, 'Matematica', 4),
  (null, 'Biologia', 4),
  (null, 'Historia de Venezuela', 4),
  (null, 'Educacion Artistica', 4),
  (null, 'Castellano y Literatura', 4),
  (null, 'Geografia de Venezuela', 4),
  (null, 'Fisica', 4),
  (null, 'Quimica', 4),
  (null, 'Cs de la Tierra', 4),
  (null, 'Premilitar', 4),
  (null, 'Lengua Cultura y Comunicación', 4),
  (null, 'Matematica', 4),
  (null, 'Memoria Territorio y Cuidadania', 4),
  (null, 'Ciencias Naturales', 4),
  (null, 'Componente de Participación e Integración Comunitaria', 4),
  (null, 'Castellano', 5),
  (null, 'Ingles', 5),
  (null, 'Matematica', 5),
  (null, 'Biologia', 5),
  (null, 'Fisica', 5),
  (null, 'Quimica', 5),
  (null, 'Historia Universal', 5),
  (null, 'Lengua Cultura y Comunicación', 5),
  (null, 'Matematica', 5),
  (null, 'Memoria Territorio y Cuidadania', 5),
  (null, 'Ciencias Naturales', 5),
  (null, 'Componente de Participación e Integración Comunitaria', 5),
  (null, 'Castellano', 6),
  (null, 'Ingles', 6),
  (null, 'Matematica', 6),
  (null, 'Biologia', 6),
  (null, 'Fisica', 6),
  (null, 'Quimica', 6),
  (null, 'Historia Universal', 6),
  (null, 'Lengua Cultura y Comunicación', 6),
  (null, 'Matematica', 6),
  (null, 'Memoria Territorio y Cuidadania', 6),
  (null, 'Ciencias Naturales', 6),
  (null, 'Componente de Participación e Integración Comunitaria', 6);

CREATE TABLE calificaciones(
  id INT AUTO_INCREMENT NOT NULL,
  ci_alumno VARCHAR (30) NOT NULL,
  FOREIGN KEY(ci_alumno) REFERENCES alumnos(ci) ON UPDATE CASCADE ON DELETE CASCADE,
  id_asignatura INT NOT NULL,
  FOREIGN KEY(id_asignatura) REFERENCES asignaturas (id) ON UPDATE CASCADE ON DELETE CASCADE,
  notan VARCHAR(10) NOT NULL,
  notal VARCHAR(20) NOT NULL,
  te VARCHAR(2) NOT NULL,
  mes VARCHAR(3) NOT NULL,
  anio VARCHAR(10) NOT NULL,
  id_plantel INT NOT NULL,
  PRIMARy KEY(id)) ENGINE = InnoDB deFAULT CHARACTER SET = utf8;

CREATE TABLE calificacionesG(
  id INT AUTO_INCREMENT NOT NULL,
  ci_alumno VARCHAR (30) NOT NULL,
  FOREIGN KEY(ci_alumno) REFERENCES alumnos(ci) ON UPDATE CASCADE ON DELETE CASCADE,
  id_asignatura INT NOT NULL,
  FOREIGN KEY(id_asignatura) REFERENCES asignaturasG (id) ON UPDATE CASCADE ON DELETE CASCADE,
  notan VARCHAR(10) NOT NULL,
  notal VARCHAR(20) NOT NULL,
  te VARCHAR(2) NOT NULL,
  mes VARCHAR(3) NOT NULL,
  anio VARCHAR(10) NOT NULL,
  id_plantel INT NOT NULL,
  PRIMARy KEY(id)) ENGINE = InnoDB deFAULT CHARACTER SET = utf8;

CREATE TABLE calificacionesN(
  id INT AUTO_INCREMENT NOT NULL,
  ci_alumno VARCHAR (30) NOT NULL,
  FOREIGN KEY(ci_alumno) REFERENCES alumnos(ci) ON UPDATE CASCADE ON DELETE CASCADE,
  id_asignatura INT NOT NULL,
  FOREIGN KEY(id_asignatura) REFERENCES asignaturasN (id) ON UPDATE CASCADE ON DELETE CASCADE,
  notan VARCHAR(10),
  notal VARCHAR(20),
  te VARCHAR(2) NOT NULL,
  mes VARCHAR(3) NOT NULL,
  anio VARCHAR(10) NOT NULL,
  id_plantel INT NOT NULL,
  apro VARCHAR(12),
  PRIMARy KEY(id)) ENGINE = InnoDB deFAULT CHARACTER SET = utf8;
    
CREATE TABLE usuarios(
  id INT AUTO_INCREMENT NOT NULL,
  usu VARCHAR(50),
  UNIQUE(usu),
  pass VARCHAR(50),
  nom VARCHAR(50),
  ape VARCHAR(50),
  PRIMARy KEY(id)) ENGINE = InnoDB deFAULT CHARACTER SET = utf8;
    
INSERT INTO usuarios VALUES(null, 'admin', md5('admin'), 'Administrador', 'Sistema');
