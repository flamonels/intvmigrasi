<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TownPlanningController extends Controller
{
    public function index()
    {
        return view('town_planning.index');
    }
}