<?php

namespace App\Imports;

use App\Models\Funcionario;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FuncionarioImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Funcionario([
            'ci'               => $row['ci'],
            'nombres'          => $row['nombres'],
            'apellidos'        => $row['apellidos'],
            'cargo'            => $row['cargo'],
            'edificio'         => $row['edificio'],
            'responsable'        => $row['responsable'],
            'telresponsable'=> $row['telresponsable'],
        ]);
    }
}
