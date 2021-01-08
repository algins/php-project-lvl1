<?php

namespace BrainGames\Games\Calc;

const GAME_DESCRIPTION = 'What is the result of the expression?';

function handle()
{
    $game = function () {
        $firstNumber = getNumber();
        $secondNumber = getNumber();
        $operation = getOperation();
        $answer = calc($firstNumber, $secondNumber, $operation);

        return [
            'question' => "{$firstNumber} {$operation} {$secondNumber}",
            'answer' => "{$answer}",
        ];
    };

    return [
        'game' => $game,
        'description' => GAME_DESCRIPTION,
    ];
}

function getNumber()
{
    $min = 1;
    $max = 10;

    return mt_rand($min, $max);
}

function getOperation()
{
    $operations = ['+', '-', '*'];

    return $operations[array_rand($operations)];
}

function calc($firstNumber, $secondNumber, $operation)
{
    switch ($operation) {
        case '+':
            return $firstNumber + $secondNumber;
        case '-':
            return $firstNumber - $secondNumber;
        case '*':
            return $firstNumber * $secondNumber;
        default:
            return false;
    }
}
