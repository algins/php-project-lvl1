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
        $hiddenIndex = mt_rand(0, PROGRESSION_SIZE - 1);
        $progression = generateProgression($start, $step, PROGRESSION_SIZE, $hiddenIndex);
        $answer = $hiddenIndex === 0 ? $progression[1] - $step : $progression[$hiddenIndex - 1] + $step;

        return [
            'question' => implode(' ', $progression),
            'answer' => "{$answer}",
        ];
    };

    startGame($game, GAME_DESCRIPTION);
}

function generateProgression(int $start, int $step, int $size, int $hiddenIndex): array
{
    $progression = [];

    for ($i = 0; $i < $size; $i += 1) {
        $progression[$i] = $i === $hiddenIndex ? '..' : $start + $step * $i;
    }

    return $progression;
}
