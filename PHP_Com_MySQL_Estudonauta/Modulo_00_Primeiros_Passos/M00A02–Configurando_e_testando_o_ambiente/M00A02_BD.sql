show databases;

use test;
create table teste(
cod int auto_increment,
nome varchar(20),
primary key(cod));

insert into teste values(1, 'joão');

select * from teste;