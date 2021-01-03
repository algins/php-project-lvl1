<?php

namespace Brain\Games\Even;

function handle()
{
    $game = function () {
        $number = getNumber();

        return [
            'question' => $number,
            'answer' => getAnswer($number),
        ];
    };

    return [
        'game' => $game,
        'description' => 'Answer "yes" if the number is even, otherwise answer "no".',
    ];
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
