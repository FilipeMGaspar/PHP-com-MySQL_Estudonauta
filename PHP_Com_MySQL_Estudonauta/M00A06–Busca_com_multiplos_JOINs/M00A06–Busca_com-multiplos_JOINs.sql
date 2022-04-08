use bd_games;

SELECT * FROM `jogos` JOIN `generos`  ON jogos.genero = generos.cod;

SELECT jogos.cod, nome, generos.genero, descricao, nota, capa FROM `jogos` JOIN `generos`  ON jogos.genero = generos.cod;