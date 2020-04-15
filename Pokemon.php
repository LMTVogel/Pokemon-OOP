<?php

namespace Pokemon;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});



class Pokemon
{
    static $amountOfPokemon;
    public $name;
    public $energyType;
    public $hitpoints;
    public $attacks;
    public $weakness;
    public $resistance;

    public function __construct ($name, $energyType, $hitpoints, $attacks, $weakness, $resistance)
    {
        $this->name = $name;
        $this->energyType = $energyType;
        $this->hitpoints = $hitpoints;
        $this->health = $hitpoints;
        $this->attacks = $attacks;
        $this->weakness = $weakness;
        $this->resistance = $resistance;

        self::$amountOfPokemon++;
    }

    public function battleTurn($target, $attacks)
    {
        $energyType = $this->getEnergyType()->getName();
        $weaknessEnergyType = $target->getWeakness()->getEnergyType();
        $multiplierEnergyType = $target->getWeakness()->getEnergyTypeValue();

        $resistanceEnergyType = $target->getResistance()->getEnergyType();
        $resistance = $target->getResistance()->getEnergyTypeValue();

        echo "<br><strong>" . $target->getPokemonName() .  " HP: " . $target->getHealth() . "/" .  $target->getHitpoints() . " <br><br>";
        if ($weaknessEnergyType == $energyType) {
            $damage = $attacks->getAttackDamage() * $multiplierEnergyType;
            echo $this->name . " valt aan met " .  $attacks->getAttackName() . "! It's super effective! (" . $damage . " damage)<br>";
        }
        elseif ($resistanceEnergyType == $energyType) {
            $damage = $attacks->getAttackDamage() - $resistance;
            echo $this->name . " valt aan met " .  $attacks->getAttackName() . "! It's not very effective (" . $damage . " damage)<br>";
        }
        else {
            $damage = $attacks->getAttackDamage();
            echo $this->name . " valt aan met " .  $attacks->getAttackName() . " (" . $damage . " damage)<br>";
        }

        $this->damageDone($damage, $target);
    }

    public function damageDone($damage, $target)
    {
        $target->health -= $damage;
        if ($target->getHealth() <= 0) {
            echo $target->getPokemonName()  .  " fainted!<br>";
            self::$amountOfPokemon--;
        }
        else {
            echo $target->getPokemonName() . " heeft nog " . $target->getHealth() . " hp over!<br>";
        }
    }

    static function getPopulation()
    {
        return self::$amountOfPokemon;
    }

    public function getPokemonName()
    {
        return $this->name;
    }

    public function getEnergyType()
    {
        return $this->energyType;
    }

    public function getHitpoints()
    {
        return $this->hitpoints;
    }

    public function getAttack()
    {
        return $this->attacks;
    }

    public function getWeakness()
    {
        return $this->weakness;
    }

    public function getResistance()
    {
        return $this->resistance;
    }

    public function getHealth()
    {
        return $this->health;
    }
}