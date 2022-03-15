<?php

namespace BrainGames\Games\Calc;

use Exception;

use function BrainGames\Engine\run;

const GAME_DESCRIPTION = 'What is the result of the expression?';
const MAX_NUMBER = 10;
const OPERATIONS = ['+', '-', '*'];

function runGame(): void
{
    $game = function (): array {
        $num1 = mt_rand(1, MAX_NUMBER);
        $num2 = mt_rand(1, MAX_NUMBER);
        $operation = OPERATIONS[array_rand(OPERATIONS)];
        $answer = calc($num1, $num2, $operation);

        return [
            'question' => "{$num1} {$operation} {$num2}",
            'answer' => "{$answer}",
        ];
    };

    run($game, GAME_DESCRIPTION);
}

function calc(int $num1, int $num2, string $operation): int
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            throw new Exception('Unknown operation!');
    }
}
