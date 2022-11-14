<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Location;
use App\Models\Visitor;

class HomeController extends Controller
{
    /**
     * Mostrar la página principal
     */
    public function Home()
    {
        // Obtener ubicacion
        $data = Location::GetInfo();
        $visit = new Visitor($data);
        $visit->save();
        // Mostrar inicio
        return view("home");
    }
}
