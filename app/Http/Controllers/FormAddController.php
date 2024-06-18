<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormAddController extends Controller
{
    public function showStep1()
    {
        return view('add-form-1');
    }

    public function postStep1(Request $request)
    {
        // Walidacja i przechowywanie zdjęć
        $validatedData = $request->validate([
            'photos' => 'required|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $photos = [];
        foreach ($request->file('photos') as $photo) {
            $photos[] = $photo->store('photos');
        }

        $request->session()->put('photos', $photos);

        return redirect()->route('form.step2');
    }

    public function showStep2()
    {
        return view('form.step2');
    }

    public function postStep2(Request $request)
    {
        // Walidacja i przechowywanie danych lokalizacji
        $validatedData = $request->validate([
            'location' => 'required|string|max:255',
        ]);

        $request->session()->put('location', $validatedData['location']);

        return redirect()->route('form.step3');
    }

    public function showStep3()
    {
        return view('form.step3');
    }

    public function postStep3(Request $request)
    {
        // Walidacja i przechowywanie opisu i tytułu
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        // Przechowywanie wszystkich danych lub zapisywanie do bazy danych
        $data = [
            'photos' => $request->session()->get('photos'),
            'location' => $request->session()->get('location'),
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ];

        // Zapisz dane do bazy danych lub wykonaj inne akcje

        // Wyczyść sesję
        $request->session()->forget(['photos', 'location']);

        return redirect()->route('form.success');
    }

    public function showSuccess()
    {
        return view('form.success');
    }
}
