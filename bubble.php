<?php

function bubble($array)
{
    for ($i = 0; $i < count($array); $i++) {
        $count = count($array);

        for ($j = $i + 1; $j < $count; $j++) {
            if ($array[$i] > $array[$j]) {
                list($array[$i], $array[$j]) = [$array[$j], $array[$i]];
            }
        }
    }

    return $array;
}