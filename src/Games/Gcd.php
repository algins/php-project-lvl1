<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\handle as startGame;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function handle()
{
    $game = function () {
        $firstNumber = getNumber();
        $secondNumber = getNumber();
        $answer = getGcd($firstNumber, $secondNumber);

        return [
            'question' => "{$firstNumber} {$operation} {$secondNumber}",
            'answer' => "{$answer}",
        ];
    };

    startGame($game, GAME_DESCRIPTION);
}

function getNumber()
{
    $min = 1;
    $max = 10;

    return mt_rand($min, $max);
}

function getGcd($firstNumber, $secondNumber)
{
    $min = min($firstNumber, $secondNumber);
    $max = max($firstNumber, $secondNumber);
    $modulo = $max % $min;

    if ($modulo === 0) {
        return $min;
    }

    return getGcd($min, $modulo);
}
