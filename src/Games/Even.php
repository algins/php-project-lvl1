<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\run;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
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

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function getAnswer(int $num): string
{
    return isEven($num) ? 'yes' : 'no';
}
