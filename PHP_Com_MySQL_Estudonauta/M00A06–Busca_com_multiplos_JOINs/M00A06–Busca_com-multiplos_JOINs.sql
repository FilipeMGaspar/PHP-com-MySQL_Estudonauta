use bd_games;

SELECT * FROM `jogos` j
JOIN generos g on j.generos = g.cod;