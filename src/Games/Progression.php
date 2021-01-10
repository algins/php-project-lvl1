<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\handle as startGame;

const GAME_DESCRIPTION = 'What number is missing in the progression?';
const MAX_PROGRESSION_START_VALUE = 10;
const MAX_PROGRESSION_STEP = 5;
const PROGRESSION_SIZE = 10;

function handle(): void
{
    $game = function (): array {
        $start = mt_rand(1, MAX_PROGRESSION_START_VALUE);
        $step = mt_rand(1, MAX_PROGRESSION_STEP);
        $progression = generateProgression($start, $step, PROGRESSION_SIZE);
        $key = array_rand($progression);
        $answer = $progression[$key];
        $progression[$key] = '..';

        return [
            'question' => implode(' ', $progression),
            'answer' => "{$answer}",
        ];
    };

    startGame($game, GAME_DESCRIPTION);
}

function generateProgression(int $start, int $step, int $size): array
{
    $progression = [];

    for ($i = 0; $i < $size; $i += 1) {
        $progression[$i] = $start + $step * $i;
    }

    return $progression;
}
