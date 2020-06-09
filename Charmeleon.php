<?php

class Charmeleon extends \Pokemon\Pokemon
{
    /** Word uitgevoerd als er een nieuwe charmeleon object word aangemaakt.
     * @param string $name
     */
    public function __construct($name)
    {
        $energyType = new EnergyType('Fire');
        $hitpoints = 60;
        $attacks = array(
            'Head Butt' => new Attack('Head Butt', 10),
            'Flare' => new Attack('Flare', 30)
        );

        $weakness = new Weakness('Water', 2);
        $resistance = new Resistance('Lightning', 10);
        /** 
         * Constructor die gebruikt wordt om een Pokemon object aan te maken
         * @param string $name
         * @param string $energyType
         * @param int $hitpoints
         * @param mixed $attacks
         * @param mixed $weakness
         * @param mixed $resistance
        */
        parent::__construct($name, $energyType, $hitpoints, $attacks, $weakness, $resistance);
    }
}