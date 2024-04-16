<?php

namespace App\Http\Controllers;

use App\Models\Employees;

class EmployeesController extends Controller
{
    public function getUsers() {
        echo Employees::getEmployees();
    }
}
