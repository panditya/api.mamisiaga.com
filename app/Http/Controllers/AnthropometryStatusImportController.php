<?php

namespace App\Http\Controllers;

use App\Imports\AnthropometryStatusImport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AnthropometryStatusImportController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'file' => ['required']
        ]);

        Excel::import(new AnthropometryStatusImport, $request->file('file'));

        return new JsonResponse(null, 200);
    }
}
