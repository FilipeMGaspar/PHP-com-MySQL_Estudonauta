CREATE DATABASE db_vendeBolachas;

USE db_vendeBolachas;

create table clientes(
	NrCliente int not null auto_increment,
    NomeCliente varchar(40) not null,
    Endereço varchar(120) not null,
    telefone int(9) not null,
    primary key(NrCliente)
) engine=InnoDB default charset=utf8;
