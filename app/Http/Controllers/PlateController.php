<?php

namespace App\Http\Controllers;

use App\Events\PlateCreated;
use App\Plate;
use Illuminate\Http\Request;

class PlateController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $plate = Plate::create([
            'name' => 'ABC 23NB',
            'axles' => 9
        ]);

        event(new PlateCreated($plate));

        return response($plate, 201);
    }
}
