CREATE DATABASE db_vendeBolachas;

USE db_vendeBolachas;

create table clientes(
	NrCliente int not null auto_increment,
    NomeCliente varchar(40) not null,
    Endereço varchar(120) not null,
    telefone int(9) not null,
    primary key(NrCliente)
) engine=InnoDB default charset=utf8;

create table artigos(
	CodArtigos int not null auto_increment,
    Artigo varchar(40) not null,
    peso int not null,
    preço DECIMAL not null,
    primary key(CodArtigos)
) engine=InnoDB default charset=utf8;

INSERT INTO clientes (NrCliente, NomeCliente, Endereço, telefone) VALUES
(1,"Maria Raposa", "Rua do Manjerico, 24 - Porto", 223456478),
(2, "Petronilde Facadinhas", "Rua de Sto António, 45 - Vuila real", 259876509),
(3, "Manuel Joaquim", "Rua da Justiça, 3 - Lisboa", 938548890),
(4, "Tony Carreira", "Avª das Camionetes, 123 - Almada", 938965412);

INSERT INTO artigos (CodArtigos, Artigo, peso, preço) VALUES
(1, "Bolacha Maria Cuétara", 200, 0,45),
(2, "Bolacha Manteiga Belgas tipo caseiro", 220, 1,19),
(3, "Bolacha Aveia Triunfo", 180, 0,94),
(4, "Bolacha Côco Bauducco", 162, 0,98);