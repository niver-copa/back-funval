<?php

namespace App\Http\Controllers;

use App\Models\Combustible;
use Illuminate\Http\Request;

class CombustibleController extends Controller
{
    public function index()
    {
        $combustibles = Combustible::all();

        return $combustibles;
    }
}
