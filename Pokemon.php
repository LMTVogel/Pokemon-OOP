<?php

namespace Pokemon;
// Als er een class wordt aangeroepen als die nog niet is aangeroepen doet de function dit automatisch.
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

    /** 
     * Constructor die gebruikt wordt om een Pokemon object aan te maken
     * @param string $name
     * @param string $energyType
     * @param int $hitpoints
     * @param mixed $attacks
     * @param mixed $weakness
     * @param mixed $resistance
    */
    
    public function __construct ($name, $energyType, $hitpoints, $attacks, $weakness, $resistance)
    {
        $this->name = $name;
        $this->energyType = $energyType;
        $this->hitpoints = $hitpoints;
        $this->health = $hitpoints;
        $this->attacks = $attacks;
        $this->weakness = $weakness;
        $this->resistance = $resistance;
        // Verhoogt de amountOfPokemon met 1 elke keer als de constructor word uitgevoerd.
        self::$amountOfPokemon++;
    }
    /**
     * De function battleTurn voert het gevecht uit.
     * @param string $target
     * @param mixed $attacks
     */
    public function battleTurn($target, $attacks)
    {
        
        $energyType = $this->getEnergyType()->getName();
        $weaknessEnergyType = $target->getWeakness()->getEnergyType();
        $multiplierEnergyType = $target->getWeakness()->getEnergyTypeValue();

        $resistanceEnergyType = $target->getResistance()->getEnergyType();
        $resistance = $target->getResistance()->getEnergyTypeValue();
        // Print de naam en de HP en hoeveel hitpoints de Pokemon nog heeft.
        echo "<br><strong>" . $target->getPokemonName() .  " HP: " . $target->getHealth() . "/" .  $target->getHitpoints() . " <br><br>";
        // Als de weakness overeenkomt met de energytype van de aanvallende Pokemon dan word de multiplier gebruikt.
        if ($weaknessEnergyType == $energyType) {
            $damage = $attacks->getAttackDamage() * $multiplierEnergyType;
            echo $this->name . " valt aan met " .  $attacks->getAttackName() . "! It's super effective! (" . $damage . " damage)<br>";
        } 
        // Als de resistance overeenkomt met de energytupe dan word de resistance afgetrokken van de attackdamage.
        elseif ($resistanceEnergyType == $energyType) {
            $damage = $attacks->getAttackDamage() - $resistance;
            echo $this->name . " valt aan met " .  $attacks->getAttackName() . "! It's not very effective (" . $damage . " damage)<br>";
        } 
        // Laat de attack zien met de damage die wordt aangedaan.
        else {
            $damage = $attacks->getAttackDamage();
            echo $this->name . " valt aan met " .  $attacks->getAttackName() . " (" . $damage . " damage)<br>";
        }
        
        $this->damageDone($damage, $target);
    }
    
    /**
     * Laat zien of de Pokemon dood is of hij laat zien hoeveel HP er nog over is.
     * @param int $damage
     * @param string $target
     */

    public function damageDone($damage, $target)
    { 
        // Als de HP 0 is dan wordt er een Pokemon afgehaald
        $target->health -= $damage;
        if ($target->getHealth() <= 0) {
            echo $target->getPokemonName()  .  " fainted!<br>";
            self::$amountOfPokemon--;
        }
        // Laat zien hoeveel HP er nog over is.
        else {
            echo $target->getPokemonName() . " heeft nog " . $target->getHealth() . " hp over!<br>";
        }
    }
    
    /**
     * @return int $amountOfPokemon
     */
    static function getPopulation()
    {
        return self::$amountOfPokemon;
    }
    /**
     * @return string $name
     */
    public function getPokemonName()
    {
        return $this->name;
    }
    /**
     * @return string $energyType
     */
    public function getEnergyType()
    {
        return $this->energyType;
    }
    /**
     * @return int $hitpoints
     */
    public function getHitpoints()
    {
        return $this->hitpoints;
    }
    /**
     * @return mixed $attacks
     */
    public function getAttack()
    {
        return $this->attacks;
    }
    /**
     * @return mixed $weakness
     */
    public function getWeakness()
    {
        return $this->weakness;
    }
    /**
     * @return mixed $resistance
     */
    public function getResistance()
    {
        return $this->resistance;
    }
    /**
     * @return int $health
     */
    public function getHealth()
    {
        return $this->health;
    }
}