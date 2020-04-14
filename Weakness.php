<?php

class Weakness
{
    public $name;
    public $multiplier;

    public function __construct($name, $multiplier)
    {
        $this->name = $name;
        $this->multiplier = $multiplier;
    }

    public function getEnergyType()
    {
        return $this->name;
    }

    public function getEnergyTypeValue()
    {
        return $this->multiplier;
    }
}