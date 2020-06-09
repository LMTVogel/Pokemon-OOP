<?php

class Attack
{
    private $name;
    private $damage;
    /** Constuctor wordt uitgevoerd als er een nieuwe attack wordt aangemaakt.
     * @param string $name
     * @param int $damage
     */
    public function __construct($name, $damage)
    {
        $this->name = $name;
        $this->damage = $damage;
    }
    /**
     * @param int $multiplier
     */
    public function multiplyDamage($multiplier)
    {
        $this->damage = $this->damage * $multiplier;
    }
    /**
     * @param string $resistance
     */
    public function reduceDamage($resistance)
    {
        $this->damage = $this->damage - $resistance;
    }
    /**
     * @return string $name
     */
    public function getAttackName()
    {
        return $this->name;
    }
    /**
     * @return int $damage
     */
    public function getAttackDamage()
    {
        return $this->damage;
    }
}