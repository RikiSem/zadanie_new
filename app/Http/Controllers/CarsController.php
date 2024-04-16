<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Exception;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function getAvailableCars(Request $request)
    {
        $userId = (int) $request->get('user_id');
        $filter = $request->get('filter') ?? [];
        if (empty($userId)) {
            throw new Exception('Поле user_id пустое');
        }


        if (empty($filter)) {
            $cars = Cars::getAvailableCars($userId);
        } else {
            $cars = Cars::getAvailableCarsWithFilter($userId, $filter);
        }

        echo(json_encode($cars));
    }
}
