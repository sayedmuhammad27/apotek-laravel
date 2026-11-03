<?php

namespace App\Http\Controllers;

class PostmanExportController extends Controller
{
    public function downloadCollection()
    {
        $filePath = base_path('Apotek_API.postman_collection.json');
        return response()->download($filePath, 'Apotek_API.postman_collection.json');
    }

    public function downloadEnvironment()
    {
        $filePath = base_path('Apotek_Environment.postman_environment.json');
        return response()->download($filePath, 'Apotek_Environment.postman_environment.json');
    }
}
