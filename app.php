<?php

require 'vendor/autoload.php';

use App\Action;
use App\IO\Input;
use App\Entity\Plateau;
use App\Entity\Rover;


echo "Provide Plateau Data\n";
$plateauInput = fgets(STDIN);

$outputData = [];
for($i = 0; $i < 1; ++$i) {
    echo "Provide Rover{$i} Data \n";
    $roverInput = fgets(STDIN);
    $movementInput = fgets(STDIN);

    $position = Input::plateauInputFromString($plateauInput);
    $plateau  = new Plateau($position);

    $input = Input::roverInputFromString($roverInput);
    $rover = new Rover($input['position'], $input['direction']);
    $action = new Action($rover);
    $outputData[] = $action->act(Input::movementCommandsFromString($movementInput));
}

echo "Result\n";

foreach ($outputData as $result) {
    echo $result . "\n";
}

