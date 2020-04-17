<?php

class Resistance
{
    public $name;
    public $value;
    /* Constructor wordt uitgevoerd als er een nieuw object wordt aangemaakt */
    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }
    /* Pakt de naam van de energy type */
    public function getEnergyType()
    {
        return $this->name;
    }
    /* Pakt de value van de resistance */
    public function getEnergyTypeValue()
    {
        return $this->value;
    }
}