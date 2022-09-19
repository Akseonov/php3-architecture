<?php

class SquareAreaLib
{
    public function getSquareArea(int $diagonal)
    {
        return ($diagonal ** 2) / 2;
    }
}

class CircleAreaLib
{
    public function getCircleArea(int $diagonal)
    {
        return (M_PI * $diagonal ** 2)/4;
    }
}

interface ISquare
{
    function squareArea(int $sideSquare);
}
interface ICircle
{
    function circleArea(int $circumference);
}

class SquareAdapter implements ISquare {
    protected SquareAreaLib $squareAreaLib;

    public function __construct()
    {
        $this->squareAreaLib = new SquareAreaLib();
    }

    public function squareArea(int $sideSquare): int
    {
        return $this->squareAreaLib->getSquareArea($sideSquare);
    }
}

class CircleAdapter implements ICircle {
    protected CircleAreaLib $circleAreaLib;

    public function __construct()
    {
        $this->circleAreaLib = new CircleAreaLib();
    }

    public function circleArea(int $circumference): int
    {
        return $this->circleAreaLib->getCircleArea($circumference);
    }
}

$square = new SquareAdapter();
echo $square->squareArea(4) . PHP_EOL;

$circle = new CircleAdapter();
echo $circle->circleArea(3) . PHP_EOL;