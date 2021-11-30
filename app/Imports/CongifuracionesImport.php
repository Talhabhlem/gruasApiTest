<?php

namespace App\Imports;

use App\Models\Configuracion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Facades\Excel;

class CongifuracionesImport implements ToModel, WithHeadingRow, WithValidation
{
    private $numRows = 0;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
            ++$this->numRows;
            return new Configuracion([
                'longitud_de_pluma' => $row['longitud_de_pluma'],
                'radio' => $row['radio'],
                'peso' => $row['peso'],
                'grua' => $row['grua'],
                'configuracion' => $row['configuracion']
            ]);
 
    }
 
    public function rules(): array
    {
        return [
            'longitud_de_pluma' => 'required',
            'radio' => 'required',
            'peso' => 'required',
            'grua' => 'required',
            'configuracion' => 'required'
        ];
    }
 
    public function getRowCount(): int
    {
        return $this->numRows;
    }
}
