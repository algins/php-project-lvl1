<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\handle as startGame;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const MAX_NUMBER = 100;

function handle()
{
    $game = function () {
        $num = mt_rand(1, MAX_NUMBER);

        return [
            'question' => $num,
            'answer' => getAnswer($num),
        ];
    };

    startGame($game, GAME_DESCRIPTION);
}

function isEven($num)
{
    return $num % 2 === 0;
}

function getAnswer($num)
{
    return isEven($num) ? 'yes' : 'no';
}
