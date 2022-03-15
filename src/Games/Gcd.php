<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\run;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const MAX_NUMBER = 10;

function runGame(): void
{
    $game = function (): array {
        $num1 = mt_rand(1, MAX_NUMBER);
        $num2 = mt_rand(1, MAX_NUMBER);
        $answer = calcGcd($num1, $num2);

        return [
            'question' => "{$num1} {$num2}",
            'answer' => "{$answer}",
        ];
    };

    run($game, GAME_DESCRIPTION);
}

function calcGcd(int $num1, int $num2): int
{
    $min = min($num1, $num2);
    $max = max($num1, $num2);
    $modulo = $max % $min;

    if ($modulo === 0) {
        return $min;
    }

    return calcGcd($min, $modulo);
}
