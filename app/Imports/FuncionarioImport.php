<?php

namespace App\Imports;

use App\Models\Funcionario;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpParser\Node\Stmt\TryCatch;

class FuncionarioImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (empty($row['ci'])) {
            return null;
        }
        
        $funcionario = new Funcionario([
            'ci'               => $row['ci'],
            'nombres'          => $row['nombres'],
            'apellidos'        => $row['apellidos'],
            'cargo'            => $row['cargo'],
            'edificio'         => $row['edificio'],
            'responsable'        => $row['responsable'],
            'telresponsable'=> $row['telresponsable'],
        ]);

        Log::info($funcionario);
        // dd($funcionario);
        return $funcionario;
    }
}
