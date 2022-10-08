<?php

function binary($array, $value) {
    $start = 0;
    $end = count($array) - 1;
    $n = 0;

    while ($start <= $end) {
        $n++;

        $base = floor(($start + $end) / 2);

        if ($array[$base] === $value) {
            echo "удалил элемент $value с индексом $base";
            unset($array[$base]);
        } elseif ($array[$base] < $value) {
            $start = $base + 1;
        } else {
            $end = $base + 1;
        }
    }

    return null;
}