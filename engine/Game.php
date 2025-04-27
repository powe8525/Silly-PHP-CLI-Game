<?php 

namespace RPG\Engine;

use RPG\Player;
use RPG\Monster;

class Game {
    /**
     * Starts the battle between a player and a monster.
     *
     * @param Player $player1 The player character.
     * @param Monster $mob The monster to fight against.
     */
    public function start(Player $player1, Monster $mob): void {
        echo "\n\nBattle Start: {$player1->name} vs {$mob->name}\n\n";
        $round = 1;

        while ($player1->isAlive && $mob->isAlive) {
            echo "---- Round {$round} ----\n";

            if (random_int(0, 1) === 0) {
                $attacker = $player1;
                $defender = $mob;
            } else {
                $attacker = $mob;
                $defender = $player1;
            }


            $attacker->takeTurn($defender);
            echo "\n🩸  {$attacker->getName()}'s HP: {$attacker->getHp()}\n🩸  {$defender->getName()}'s HP: {$defender->getHp()}\n";

            if (!$defender->isAlive) {
                echo "\n---- It is done! ----";
                echo "\n💀 {$defender->name} has fallen!\n";
                echo "🏆 {$attacker->name} wins the battle with {$attacker->hp} HP left!\n";

                // If the attacker is the player, they win and can loot the monster
                if ($attacker instanceof Player) {
                    $loot = $mob->getLoot();
                    echo "\n⭐ You have defeated the {$mob->getName()}!\n";
                    echo "💲 You found a \"{$loot['item']}\" worth {$loot['value']} gold!\n\n";
                } else {
                    echo "\n😭 You have been defeated by the {$mob->getName()}!\n";
                }
                break;
            }

            $round++;
            echo "\n";
            usleep(500000);
        }
    }
}