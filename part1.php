<?php

$input = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'input.txt');
$options = [
    "X" => "rock",
    "Y" => "paper",
    "Z" => "scissors",
    "A" => "rock",
    "B" => "paper",
    "C" => "scissors",
];
$moveScore = [
    "rock" => 1,
    "paper" => 2,
    "scissors" => 3,
    "draw" => 3,
    "win" => 6,
    "lose" => 0,
];
$moves = explode(PHP_EOL, $input);
$score = 0;

foreach ($moves as $move) {
    $choices = explode(' ', $move);
    $opponentChoice = $options[$choices[0]];
    $myChoice = $options[$choices[1]];
    $result = '';

    if ($myChoice === $opponentChoice) {
        $result = 'draw';
    } elseif ($myChoice === 'rock') {
        if ($opponentChoice === 'scissors') {
            $result = 'win';
        } else {
            $result = 'lose';
        }
    } elseif ($myChoice === 'paper') {
        if ($opponentChoice === 'rock') {
            $result = 'win';
        } else {
            $result = 'lose';
        }
    } elseif ($myChoice === 'scissors') {
        if ($opponentChoice === 'paper') {
            $result = 'win';
        } else {
            $result = 'lose';
        }
    }

    $score += $moveScore[$result] + $moveScore[$myChoice];
}

echo $score;