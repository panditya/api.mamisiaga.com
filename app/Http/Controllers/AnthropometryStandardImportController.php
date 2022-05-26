<?php

namespace App\Http\Controllers;

use App\Imports\AnthropometryStandardImport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AnthropometryStandardImportController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'file' => ['required']
        ]);

        Excel::import(new AnthropometryStandardImport, $request->file('file'));

        return new JsonResponse(null, 200);
    }
}
