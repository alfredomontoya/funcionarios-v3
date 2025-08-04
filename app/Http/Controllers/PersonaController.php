<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PersonaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            Bitacora::create([
                'user_id' => Auth::id(),
                'busqueda' => $search,
                'hostname' => gethostbyaddr($request->ip()),
            ]);
        }

        $personas = Persona::query()
            ->when($search, function ($query, $search) {
                $query->where('ci', 'like', "%{$search}%")
                    ->orWhere('nombres', 'like', "%{$search}%")
                    ->orWhere('apellidos', 'like', "%{$search}%")
                    ->orWhere('cargo', 'like', "%{$search}%");
            })
            ->get();

        return Inertia::render('personas/index', [
            'personas' => $personas,
            'filters' => [
                'search' => $search,
            ],
        ]);
    }
}
