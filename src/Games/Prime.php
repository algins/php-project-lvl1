<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\run;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MAX_NUMBER = 100;

function runGame(): void
{
    $game = function (): array {
        $num = mt_rand(1, MAX_NUMBER);

        return [
            'question' => $num,
            'answer' => getAnswer($num),
        ];
    };

    run($game, GAME_DESCRIPTION);
}

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }

    for ($i = 2; $i <= $num / 2; $i += 1) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}

function getAnswer(int $num): string
{
    return isPrime($num) ? 'yes' : 'no';
}
