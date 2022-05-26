<?php

namespace App\Imports;

use App\Models\AnthropometryStandard;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AnthropometryStandardImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    public function model(array $row): ?AnthropometryStandard
    {
        return new AnthropometryStandard([
            'anthropometry_status_id' => $row['anthropometry_status_id'],
            'age_in_months' => $row['age_in_months'],
            'standard_deviation' => $row['standard_deviation'],
        ]);
    }
}
