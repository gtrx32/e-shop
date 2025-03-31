<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Log;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExcelController extends Controller
{
    public function index()
    {
        return view('excel.index');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:10240',
        ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs('excel', $fileName, 'public');

        $spreadsheet = IOFactory::load(storage_path('app/public/' . $filePath));

        $sheets = $spreadsheet->getAllSheets();

        $data = [];

        foreach ($sheets as $sheet) {
            $data[] = $sheet->toArray('пустата внутри', true, true, true);
        }

        Storage::disk('public')->delete($filePath);

        return view('excel.index', compact('data', 'fileName'));
    }
}
