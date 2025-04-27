<?php 

namespace RPG\Classes;

use RPG\Entity;
use RPG\Player;
use RPG\playerClass;

class Cleric extends playerClass {
    public function __construct() {
        $this->name = "Cedrik the Cleric";
        $this->maxHp = 120; // Cleric has moderate HP
    }

    /**
     * Cleric's turn logic.
     * If HP is below 50, it heals itself; otherwise, it attacks the opponent.
     *
     * @param Player $self The player taking the turn.
     * @param Entity $opponent The opponent entity.
     */
    public function takeTurn(Player $self, Entity $opponent): void {
        if ($self->getHp() < 50) {
            $healAmount = random_int(25, 75);
            $self->heal($healAmount);
            echo "❤️  {$self->getName()} casts a healing spell and heals for $healAmount HP!\n";
        } else {
            $damage = random_int(5, 15);
            $opponent->hurt($damage);
            echo "⚔️  {$self->getName()} hits {$opponent->getName()} for $damage damage!\n";
        }
    }
}