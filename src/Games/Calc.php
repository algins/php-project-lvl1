<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\handle as startGame;

const GAME_DESCRIPTION = 'What is the result of the expression?';
const MAX_NUMBER = 10;

function handle()
{
    $game = function () {
        $num1 = mt_rand(1, MAX_NUMBER);
        $num2 = mt_rand(1, MAX_NUMBER);
        $operation = getOperation();
        $answer = calc($num1, $num2, $operation);

        return [
            'question' => "{$num1} {$operation} {$num2}",
            'answer' => "{$answer}",
        ];
    };

    startGame($game, GAME_DESCRIPTION);
}

function getOperation()
{
    $operations = ['+', '-', '*'];

    return $operations[array_rand($operations)];
}

function calc($num1, $num2, $operation)
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            return false;
    }
}
