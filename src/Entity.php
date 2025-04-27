<?php 

namespace RPG;

use RPG\Interfaces\iEntityBasics;

abstract class Entity implements iEntityBasics
{
    public string $name;
    public int $hp; // Current HP
    public int $maxHp; // Maximum HP
    public bool $isAlive = true; // Entity's alive status

    public function __construct(string $name, int $maxHp) {
        $this->name = $name;
        $this->maxHp = $maxHp;
        $this->hp = $maxHp; // Set initial HP to max HP
    }

    public function getName(): string {
        return $this->name;
    }

    public function getHp(): int {
        return $this->hp;
    }
    
    public function hurt(int $amount): void {
        $this->hp -= $amount;
        if ($this->hp < 0) {
            $this->hp = 0; // Prevent negative HP
            $this->isAlive = false; // Entity is dead
        }
    }
    
    public function heal(int $amount): void {
        $this->hp += $amount;
        if ($this->hp > $this->maxHp) {
            $this->hp = $this->maxHp; // Cap HP at max HP
        }
    }

}