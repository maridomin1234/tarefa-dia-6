CREATE DATABASE db_tarefa 

USE db_tarefa

CREATE TABLE tbl_usuarios (
  usu_codigo INT PRIMARY KEY AUTO_INCREMENT,
  usu_nome VARCHAR(50),
  usu_email VARCHAR(50)
);          

CREATE TABLE tbl_tarefas (
  tar_codigo INT PRIMARY KEY AUTO_INCREMENT,
  tar_setor VARCHAR(50),
  tar_prioridade VARCHAR(50),
  tar_descriçao VARCHAR (50),
  tar_status VARCHAR (50),
  usu_codigo INT,
  FOREIGN KEY (usu_codigo) REFERENCES tbl_usuarios(usu_codigo)
);


