<?php

class EnergyType 
{
    public $name;
    /** Word uitgevoerd voor elke nieuwe EnergyType
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
    /**
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }
}