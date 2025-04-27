<?php 

namespace RPG;

use RPG\Entity;
use RPG\playerClass;

class Player extends Entity {
    public playerClass $class;

    function __construct(string $name, playerClass $class) {
        parent::__construct($name, $class->maxHp); 
        $this->class = $class;
    }
    public function getClass(): playerClass {
        return $this->class;
    }

    public function takeTurn(Entity $opponent): void {
        $this->class->takeTurn($this, $opponent);
    }
}