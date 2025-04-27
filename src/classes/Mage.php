<?php 

namespace RPG\Classes;

use RPG\Entity;
use RPG\Player;
use RPG\playerClass;

class Mage extends playerClass {
    public function __construct() {
        $this->name = "Fazeron the Mage";
        $this->maxHp = 70; // Mage has less HP
    }

    public function takeTurn(Player $self, Entity $opponent): void {        
        $damage = random_int(25, 65);
        $opponent->hurt($damage);
        echo "⚔️  {$self->getName()} nukes {$opponent->getName()} for $damage damage!\n";        
    }
}