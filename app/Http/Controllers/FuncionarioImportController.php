<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\FuncionarioImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Funcionario;

class FuncionarioImportController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls'
        ]);

        Excel::import(new FuncionarioImport, $request->file('file'));

        // Devuelvo lista actualizada
        $funcionarios = Funcionario::latest()->get();

        return response()->json([
            'message' => 'Importación completada',
            'funcionarios' => $funcionarios
        ]);
    }
}
