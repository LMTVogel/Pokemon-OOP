<?php

require 'Pokemon.php';
/* Gebruikt de class Pokemon in de namespace Pokemon */
use Pokemon\Pokemon;
/* Maakt nieuwe objecten aan */
$pikachu = new Pikachu('Lau');
$charmeleon = new Charmeleon('Tiny');
/* De method BattleTurn() wordt uitgevoerd op de onderstaande objecten */
$pikachu->battleTurn($charmeleon, $pikachu->attacks['Electric Ring']);
$charmeleon->battleTurn($pikachu, $charmeleon->attacks['Flare']);
/* Laat zien hoeveel Pokemons er nog leven door middel van de function getPopulation() in de class Pokemon */
echo '<br>Op dit moment zijn er ' . Pokemon::getPopulation() . ' Pokemons levend.';