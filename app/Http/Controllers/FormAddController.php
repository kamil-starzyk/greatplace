<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormAddController extends Controller
{
    public function submitForm(Request $request)
    {
        $data = $request->validate([
            'photos' => 'required|array',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        // Zapisz dane do bazy danych lub wykonaj inne akcje

        return response()->json(['message' => 'Form submitted successfully!']);
    }
}
