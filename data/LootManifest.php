<?php

namespace RPG\Data;

class LootManifest
{
    public static function getLoot(): array
    {
        return [
            'Rusty Sword' => 10,
            'Healing Potion' => 25,
            'Magic Ring' => 100,
            'Enchanted Shield' => 75,
            'Sword of Face' => 250
        ];
    }
}