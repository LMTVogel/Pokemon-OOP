<?php

require 'Pokemon.php';
require 'Pikachu.php';
require 'Charmeleon.php';

use Pokemon\Pokemon;

$pikachu = new Pikachu('Lau');
$charmeleon = new Charmeleon('Tiny');

$pikachu->battleTurn($charmeleon, $pikachu->attacks['Electric Ring']);
$charmeleon->battleTurn($pikachu, $charmeleon->attacks['Flare']);

echo '<br>Op dit moment zijn er ' . Pokemon::getPopulation() . ' Pokemons levend.';
