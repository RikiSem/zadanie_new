<?php

namespace App\Http\Classes;

class PositionsAtWork
{
    private const POSITION = [
        'manager' => 'manager',
        'developer' => 'developer',
        'director' => 'director'
    ];

    public static function getPositions()
    {
        return self::POSITION;
    }

    public static function getManagerPosition()
    {
        return self::POSITION['manager'];
    }

    public static function getDeveloperPosition()
    {
        return self::POSITION['developer'];
    }

    public static function getDirectorPosition()
    {
        return self::POSITION['director'];
    }
}
