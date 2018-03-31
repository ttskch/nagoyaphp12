<?php

namespace Ttskch\Nagoyaphp12;

class Calculator
{
    public static function half(int $price): int
    {
        return intval(round($price * 0.5, -1));
    }
}
