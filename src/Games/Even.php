<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\handle as startGame;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function handle()
{
    $game = function () {
        $number = getNumber();
        $answer = getAnswer($number);

        return [
            'question' => $number,
            'answer' => $answer,
        ];
    };

    startGame($game, GAME_DESCRIPTION);
}

function getNumber()
{
    $min = 1;
    $max = 100;

    return mt_rand($min, $max);
}

function isEven($number)
{
    return $number % 2 === 0;
}

function getAnswer($number)
{
    return isEven($number) ? 'yes' : 'no';
}
