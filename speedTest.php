<?php

include 'array.php';
include 'bubble.php';
include 'quick.php';
include 'binary.php';

function getArr(): array
{
    return _randomArray(3000);
}

$arr = getArr();
$lastIndex = count($arr) - 1;

$start = microtime(true);
bubble($arr);
echo "Пузырьком: " . (microtime(true) - $start) . PHP_EOL;

$arr = getArr();
quick($arr);
echo "Быстрой: " . (microtime(true) - $start) . PHP_EOL;

$arr = getArr();
binary($arr, 5);
echo "Бинарный: " . (microtime(true) - $start) . PHP_EOL;