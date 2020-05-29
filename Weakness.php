<?php

class Weakness
{
    public $name;
    public $multiplier;
    /** Constructor wordt uitgevoerd als er een nieuw object wordt aangemaakt
     * @param string $name
     * @param int $multiplier
     */
    public function __construct($name, $multiplier)
    {
        $this->name = $name;
        $this->multiplier = $multiplier;
    }
    /** Pakt de naam van de energy type
     * @return string $name
     */
    public function getEnergyType()
    {
        return $this->name;
    }
    /** Pakt de value van de energy type die gebruikt wordt als multiplier
     * @return int $multiplier
     */
    public function getEnergyTypeValue()
    {
        return $this->multiplier;
    }
}