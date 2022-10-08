<?php

function quick($array): array
{
    $arrayCount = count($array);

    if ($arrayCount <= 1) {
        return $array;
    }

    $base = $array[0];
    $left = [];
    $right = [];

    for ($i = 1; $i < $arrayCount; $i++) {
        if ($base >= $array) {
            $left[] = $array[$i];
        } else {
            $right[] = $array[$i];
        }
    }

    $left = quick($left);
    $right = quick($right);

    return array_merge($left, [$base], $right);
}