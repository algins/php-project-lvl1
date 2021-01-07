<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS = 3;

function handle($game, $description)
{
    line('Welcome to the Brain Games!');
    $playerName = prompt('May I have your name?');
    line("Hello, %s!", $playerName);
    line($description);

    for ($i = 1; $i <= ROUNDS; $i += 1) {
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
