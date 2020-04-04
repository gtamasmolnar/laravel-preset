<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Md5Controller extends Controller
{
    public function index(Request $request)
    {
        $validated = request()->validate([
            'toBeConverted' => 'string'
        ]);

        return md5($validated['toBeConverted']);

    }
}