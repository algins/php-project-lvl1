<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function run(callable $game, string $description): void
{
    line('Welcome to the Brain Games!');
    $playerName = prompt('May I have your name?');
    line("Hello, %s!", $playerName);
    line($description);

    for ($i = 1; $i <= ROUNDS_COUNT; $i += 1) {
        ['question' => $question, 'answer' => $correctAnswer] = $game();
        line('Question: %s', $question);
        $playerAnswer = prompt('Your answer');

        if ($playerAnswer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $playerAnswer, $correctAnswer);
            line("Let's try again, %s!", $playerName);
            return;
        }

        line('Correct!');
    }

    line("Congratulations, %s!", $playerName);
}
