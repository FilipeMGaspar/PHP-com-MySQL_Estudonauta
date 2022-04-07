create database db_games default character set utf8 collate utf8_general_ci;
use db_games;

create table usuarios (
	usuario varchar(10) not null,
    nome varchar(30) not null,
    senha varchar(60) not null,
    tipo varchar(10) not null default 'editor',
    primary key(usuario)
) engine=InnoDB default charset=utf8;
