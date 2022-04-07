create database db_games default character set utf8 collate utf8_general_ci;
use db_games;

create table usuarios (
	usuario varchar(10) not null auto_increment,
    nome varchar(30) not null,
    senha varchar(60) not null,
    tipo varchar(10) not null default 'editor'
) engine=InnoDB default charset=utf8;
