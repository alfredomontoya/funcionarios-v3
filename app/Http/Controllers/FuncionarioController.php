<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class FuncionarioController extends Controller
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


        $funcionarios = Funcionario::query()
            ->when($search, function ($query, $search) {
                $query->where('ci', 'like', "%{$search}%")
                    ->orWhere('nombres', 'like', "%{$search}%")
                    ->orWhere('apellidos', 'like', "%{$search}%");
            })
            ->get();

        // dd($funcionarios);

        return Inertia::render('funcionarios/index', [
            'funcionarios' => $funcionarios,
            'filters' => [
                'search' => $search,
            ],
        ]);
    }

    public function create(){
        return Inertia::render('funcionarios/InsertForm');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ci'               => 'required|string|max:20',
            'nombres'          => 'required|string|max:100',
            'apellidos'        => 'required|string|max:100',
            'cargo'            => 'required|string|max:100',
            'edificio'         => 'nullable|string|max:100',
            'responsable'        => 'nullable|string|max:100',
            'telresponsable'=> 'nullable|string|max:20',
        ]);


        $funcionario = Funcionario::create($validated);


        // Devolvemos lista actualizada
        $funcionarios = Funcionario::latest()->get();

        return response()->json([
            'message' => 'Funcionario registrado con éxito',
            'funcionarios' => $funcionarios
        ]);
    }
}
