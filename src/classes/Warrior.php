<?php 

namespace RPG\Classes;

use RPG\Entity;
use RPG\Player;
use RPG\playerClass;

class Warrior extends playerClass {
    public function __construct() {
        $this->name = "Chuck the Warrior";
        $this->maxHp = 150; // Warrior has more HP
    }

    public function takeTurn(Player $self, Entity $opponent): void {        
        $damage = random_int(15, 30);
        $opponent->hurt($damage);
        echo "⚔️  {$self->getName()} hits {$opponent->getName()} for $damage damage!\n";        
    }
}