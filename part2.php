<?php

$input = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'input.txt');
$playOptions = [
    "A" => "rock",
    "B" => "paper",
    "C" => "scissors",
];
$gameOptions = [
    "X" => "lose",
    "Y" => "draw",
    "Z" => "win"
];
$gameScore = [
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
    $opponentChoice = $playOptions[$choices[0]];
    $gameResult = $gameOptions[$choices[1]];
    $myChoice = '';

    if ($gameResult === 'draw') {
        $myChoice = $opponentChoice;
    } elseif ($gameResult === 'lose') {
        if ($opponentChoice === 'rock') {
            $myChoice = 'scissors';
        } elseif ($opponentChoice === 'paper') {
            $myChoice = 'rock';
        } elseif ($opponentChoice === 'scissors') {
            $myChoice = 'paper';
        }
    } elseif ($gameResult === 'win') {
        if ($opponentChoice === 'rock') {
            $myChoice = 'paper';
        } elseif ($opponentChoice === 'paper') {
            $myChoice = 'scissors';
        } elseif ($opponentChoice === 'scissors') {
            $myChoice = 'rock';
        }
    }

    $score += $gameScore[$gameResult] + $gameScore[$myChoice];
}

echo $score;
