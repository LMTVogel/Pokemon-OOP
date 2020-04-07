<?php 
require 'Superhero.php';
require 'Avenger.php';

// Objects
$spiderman = new Superhero('Spider-Man', 'Male', 'Spiderfriends', 'With great power comes great responsibility!');
$thor = new Avenger('Thor', 'Male', 'For Asgard');

$thor->sayOneliner();

print_r('<pr>'. $thor. '</pre>');