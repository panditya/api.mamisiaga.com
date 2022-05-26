<?php

namespace App\Http\Controllers;

use App\Imports\AnthropometryImport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AnthropometryImportController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'file' => ['required']
        ]);

        Excel::import(new AnthropometryImport, $request->file('file'));

        return new JsonResponse(null, 200);
    }
}
