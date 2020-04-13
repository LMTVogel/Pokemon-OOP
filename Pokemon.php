<?php

namespace Pokemon;

spl_autoload_register(function ($className) {
    include $className . '.php';
});



class Pokemon {

    static $amountOfPokemon;
    public $name;
    public $energyType;
    public $hitpoints;
    public $attack;
    public $weakness;
    public $resistance;

    public function __construct ($name, $energyType, $hitpoints, $attack, $weakness, $resistance) 
    {
        $this->name = $name;
        $this->energyType = $energyType;
        $this->hitpoints = $hitpoints;
        $this->attack = $attack;
        $this->weakness = $weakness;
        $this->resistance = $resistance;
    }
}