<?php
/* Deze file kun je nu aanroepen doormiddel van de namespace */
namespace Pokemon;
/* De code zorgt ervoor dat je niet elke file hoeft te requireren */
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
    /* Constructor wordt uitgevoerd als er een nieuwe Pokemon wordt aangemaakt */
    public function __construct ($name, $energyType, $hitpoints, $attacks, $weakness, $resistance)
    {
        $this->name = $name;
        $this->energyType = $energyType;
        $this->hitpoints = $hitpoints;
        $this->health = $hitpoints;
        $this->attacks = $attacks;
        $this->weakness = $weakness;
        $this->resistance = $resistance;
        /* Er komt elke keer een 1 bij als de constructor is uitgevoerd */
        self::$amountOfPokemon++;
    }
    /* Function gemaakt om de Pokemons elkaar aan te laten vallen */
    public function battleTurn($target, $attacks)
    {
        /* De variabeles pakken alle informatie die ze nodig voor het gevecht */
        $energyType = $this->getEnergyType()->getName();
        $weaknessEnergyType = $target->getWeakness()->getEnergyType();
        $multiplierEnergyType = $target->getWeakness()->getEnergyTypeValue();

        $resistanceEnergyType = $target->getResistance()->getEnergyType();
        $resistance = $target->getResistance()->getEnergyTypeValue();
        /* Laat zien hoeveel hitpoints een Pokemon nog heeft */
        echo "<br><strong>" . $target->getPokemonName() .  " HP: " . $target->getHealth() . "/" .  $target->getHitpoints() . " <br><br>";
        /* Kijkt of de weakness type hetzelfde is als de aanval type om zo de multiplier te activeren */
        if ($weaknessEnergyType == $energyType) {
            $damage = $attacks->getAttackDamage() * $multiplierEnergyType;
            echo $this->name . " valt aan met " .  $attacks->getAttackName() . "! It's super effective! (" . $damage . " damage)<br>";
        } /* Kijkt of de resistance type hetzelfde is als de aanval type om zo de resistance van de aanvals punten af te halen */
        elseif ($resistanceEnergyType == $energyType) {
            $damage = $attacks->getAttackDamage() - $resistance;
            echo $this->name . " valt aan met " .  $attacks->getAttackName() . "! It's not very effective (" . $damage . " damage)<br>";
        } /* Als de if en elseif niet overeenkomen dan wordt de aanval met normale values uitgevoerd */
        else {
            $damage = $attacks->getAttackDamage();
            echo $this->name . " valt aan met " .  $attacks->getAttackName() . " (" . $damage . " damage)<br>";
        }
        /* Na elke aanval wordt de aanval value van de health afgetrokken */
        $this->damageDone($damage, $target);
    }
    /* Deze function laat zien hoeveel health de Pokemon nog over heeft of hij laat zien dat hij dood is */
    public function damageDone($damage, $target)
    { /*  */
        $target->health -= $damage;
        if ($target->getHealth() <= 0) {
            echo $target->getPokemonName()  .  " fainted!<br>";
            self::$amountOfPokemon--;
        }
        else {
            echo $target->getPokemonName() . " heeft nog " . $target->getHealth() . " hp over!<br>";
        }
    }
    /* Pakt de variabele amountOfPokemon om te kijken hoe vaak de constructor is gebruikt */
    static function getPopulation()
    {
        return self::$amountOfPokemon;
    }
    /* Pakt de Pokemon naam */
    public function getPokemonName()
    {
        return $this->name;
    }
    /* Pakt de energy type van de Pokemon */
    public function getEnergyType()
    {
        return $this->energyType;
    }
    /* Pakt de hitpoints van de Pokemon */
    public function getHitpoints()
    {
        return $this->hitpoints;
    }
    /* Pakt de attacks van de Pokemon */
    public function getAttack()
    {
        return $this->attacks;
    }
    /* Pakt de weakness van de Pokemon */
    public function getWeakness()
    {
        return $this->weakness;
    }
    /* Pakt de resistance van de Pokemon */
    public function getResistance()
    {
        return $this->resistance;
    }
    /* Pakt de health van de Pokemon */
    public function getHealth()
    {
        return $this->health;
    }
}