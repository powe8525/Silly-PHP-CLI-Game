<?php 

namespace RPG;

class Monster extends Entity {

    // Name of the loot item the monster is created with
    private string $lootItem = '';
    // Value of the loot item the monster is created with
    private int $lootValue = 0;
    
    /**
     * Simulates the monster taking a turn to attack an opponent.
     * The monster deals a random amount of damage between 5 and 20 to the opponent.
     * @param Entity $opponent The opponent entity that the monster is attacking.
     * @return void
     */
    public function takeTurn(Entity $opponent): void {
        $damage = rand(5, 20);
        $opponent->hurt($damage);
        echo "⚔️  {$this->name} attacks {$opponent->getName()} for $damage damage!\n";
    }

    /**
     * Sets the loot item and its value for the monster.
     * This method allows the monster to have a specific loot item that can be dropped upon defeat. 
     * @param string $item The name of the loot item.
     * @param int $value The value of the loot item, which could represent its worth in the game.
    */
    public function setLoot(string $item, int $value): void
    {
        $this->lootItem = $item;
        $this->lootValue = $value;
    }

    /**
     * Retrieves the loot item and its value associated with the monster.
     * This method returns an associative array containing the loot item and its value.
     * @return array An associative array with 'item' and 'value' keys.
     */
    public function getLoot(): array
    {
        return [
            'item' => $this->lootItem,
            'value' => $this->lootValue,
        ];
    }
}