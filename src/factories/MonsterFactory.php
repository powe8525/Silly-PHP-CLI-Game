<?php

namespace RPG\Factories;

use RPG\Monster;
use RPG\Data\LootManifest;
use RPG\Data\MonsterManifest;

/**
 * Factory class for creating Monster instances.
 * This class provides methods to create monsters based on predefined templates or by name.
 */

class MonsterFactory
{

    /**
     * Creates a new monster instance based on a random template.
     *
     * @return Monster A randomly selected monster.
     */
    public static function getRandomMonster(): Monster
    {
        $templates = MonsterManifest::$monsterTemplates;
        $names = array_keys($templates);
        $randomName = $names[array_rand($names)];
        $hp = $templates[$randomName];

        $monster = new Monster($randomName, $hp);
        // Pick random loot
        $lootTemplates = LootManifest::getLoot();
        $lootNames = array_keys($lootTemplates);
        $randomLoot = $lootNames[array_rand($lootNames)];
        $lootValue = $lootTemplates[$randomLoot];

        $monster->setLoot($randomLoot, $lootValue);

        return $monster;
    }

    /**
     * Creates a new monster instance based on the provided name.
     *
     * @param string $name The name of the monster to create.
     * @return Monster|null Returns a Monster instance if found, or null if not found.
     */
    public static function getMonsterByName(string $name): ?Monster
    {
        $templates = MonsterManifest::getTemplates();
        if (isset($templates[$name])) {
            $monster = new Monster($name, $templates[$name]);

            // Pick random loot
            $lootTemplates = LootManifest::getLoot();
            $lootNames = array_keys($lootTemplates);
            $randomLoot = $lootNames[array_rand($lootNames)];
            $lootValue = $lootTemplates[$randomLoot];

            $monster->setLoot($randomLoot, $lootValue);

            return $monster;
        }

        return null;
    }
}