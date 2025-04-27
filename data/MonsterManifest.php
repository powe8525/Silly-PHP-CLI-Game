<?php 

namespace RPG\Data;

class MonsterManifest
{
    /**
     * An associative array of monster names and their hit points.
     * This serves as a manifest for available monsters in the game.
     */
    public static array $monsterTemplates = [
        'Goblin' => 10,
        'Orc' => 20,
        'Troll' => 50,
        'Dragon' => 600,
        'Zombie' => 15,
        'Vampire' => 250,
        'Werewolf' => 350,
        'Giant Spider' => 180,
        'Skeleton' => 12,
        'Minotaur' => 40
    ];
}