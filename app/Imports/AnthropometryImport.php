<?php

namespace App\Imports;

use App\Models\Anthropometry;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AnthropometryImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    public function model(array $row): ?Anthropometry
    {
        return new Anthropometry([
            'name' => $row['name'],
            'sex' => $row['sex']
        ]);
    }
}
