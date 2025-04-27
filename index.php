<?php

require_once __DIR__ . '/vendor/autoload.php';

use RPG\Player;
use RPG\Engine\Game;
use RPG\Factories\MonsterFactory;

// Directory to scan for class files
$classDir = __DIR__ . '/src/classes/';

// Scan the directory for all PHP files in classes subfolder
$classFiles = glob($classDir . '*.php');
$classes = [];

// Load each class dynamically from the directories and map them to their class names
foreach ($classFiles as $classFile) {
    $className = 'RPG\\Classes\\' . basename($classFile, '.php');
    // Only add classes that extend from PlayerClass
    if (is_subclass_of($className, 'RPG\\playerClass')) {
        $instance = new $className();
        $classes[] = [
            'name' => $instance->name,
            'class' => $className,
            'className' => $className,
            'maxHp' => $instance->maxHp
        ];
    }
}

echo "Choose your class:\n";

// Display the list of classes dynamically
foreach ($classes as $index => $classData) {
    $classNameWithoutNamespace = basename(str_replace('\\', '/', $classData['class']));
    echo "[" . ($index + 1) . "] {$classNameWithoutNamespace}\t\"{$classData['name']}\" \t(HP: {$classData['maxHp']})\n";
}

$choice = readline("Enter class number: ");

// Default to Warrior if the choice is invalid
if (!isset($classes[$choice - 1])) {
    echo "Invalid choice. Defaulting to Warrior.\n";
    $choice = 1; // Default to the first option
}

$selectedClass = new $classes[$choice - 1]['class']();

$customName = readline("\nEnter your hero's name (leave empty to use \"{$selectedClass->name}\"): ");

if (trim($customName) === '') {
    $customName = $selectedClass->name;
}

$player = new Player($customName, $selectedClass);

// Create a random monster
$monster = MonsterFactory::getRandomMonster();

$game = new Game();
$game->start($player, $monster);
