<?php

namespace App\Http\Classes;

class AvailableCarsComfortLvlByPosition
{
    private const MAX_AVAILABLE_CARS_COMFORT_LVL = [
        'manager' => 1,
        'developer' => 2,
        'director' => 3
    ];

    public static function getMaxAvailableCarsComfortLvlByPosition(string $position)
    {
        return self::MAX_AVAILABLE_CARS_COMFORT_LVL[$position];
    }
}
