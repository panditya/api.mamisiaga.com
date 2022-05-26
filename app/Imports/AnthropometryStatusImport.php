<?php

namespace App\Imports;

use App\Models\AnthropometryStatus;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AnthropometryStatusImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    public function model(array $row): ?AnthropometryStatus
    {
        return new AnthropometryStatus([
            'anthropometry_id' => $row['anthropometry_id'],
            'name' => $row['name'],
            'max_z_score' => $row['max_z_score'],
            'min_z_score' => $row['min_z_score'],
        ]);
    }
}
