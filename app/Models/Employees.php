<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getEmployees()
    {
        return self::select('id', 'name', 'position')->get();
    }
    public static function getEmployeeById(int $id)
    {
        return self::where('id', '=', $id)->first();
    }
}
