<?php

namespace App\Models;

use App\Http\Classes\AvailableCarsComfortLvlByPosition;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

    private const CAR_STATUS_FREE = 'free';
    private const CAR_STATUS_IN_ACTION = 'in_action';
    protected $guarded = [];
    public static function getAvailableCarsWithFilter(int $userId, array $filter)
    {
        $user = Employees::getEmployeeById($userId);
        $newFilter = [];
        foreach ($filter as $key => $item) {
            $newFilter[] = sprintf('`%s` = "%s"', $key, $item);
        }
        return self::select('id', 'model', 'comfort_lvl')
            ->where('status', '=', self::CAR_STATUS_FREE)
            ->whereRaw(implode(' and ', $newFilter))
            ->where('comfort_lvl', '<=', AvailableCarsComfortLvlByPosition::getMaxAvailableCarsComfortLvlByPosition($user->position))
            ->get();
    }

    public static function getAvailableCars(int $userId)
    {
        $user = Employees::getEmployeeById($userId);
        return self::select('id', 'model', 'comfort_lvl')
            ->where('status', '=', self::CAR_STATUS_FREE)
            ->where('comfort_lvl', '<=', AvailableCarsComfortLvlByPosition::getMaxAvailableCarsComfortLvlByPosition($user->position))
            ->get();
    }
}
