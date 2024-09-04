<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Place;
use App\Models\Tag;
use App\Models\Image;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AddPlaceController extends Controller
{
    public function submitForm(Request $request)
    {
        // Define validation rules
        $rules = [
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:52048',
            'placeName' => 'required|string|max:255',
            'selectedVoivodeship' => 'required|string|max:255',
            'selectedDistrict' => 'required|string|max:255',
            'selectedLocality' => 'required|string|max:255',
            'streetAddress' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'easeOfAccess' => 'required|string|max:255',
            'description' => 'required|string',
            'tags.*' => 'string',
            'bestSeasons.*' => 'string',
            'price' => 'required|numeric',
            'priceFor' => 'required|string|max:255'
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // Log the validation errors
            Log::error('Form validation errors: ', $validator->errors()->toArray());

            // Return validation errors to the frontend
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            DB::beginTransaction();

            // Save the Place data to the database
            $place = new Place();
            $place->place_name = $request->placeName;
            $place->selected_voivodeship = $request->selectedVoivodeship;
            $place->selected_district = $request->selectedDistrict;
            $place->selected_locality = $request->selectedLocality;
            $place->street_address = $request->streetAddress;
            $place->latitude = $request->latitude;
            $place->longitude = $request->longitude;
            $place->ease_of_access = $request->easeOfAccess;
            $place->description = $request->description;
            $place->best_seasons = json_encode($request->bestSeasons);
            $place->price = $request->price;
            $place->price_for = $request->priceFor;
            $place->save();

            // Handle file uploads and save images to the database
            Log::info($request->file('photos'));
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $path = $photo->store('public/photos');
                    // Create a new Image record
                    $image = new Image();
                    $image->place_id = $place->id;
                    $image->path = $path;
                    $image->alt_text = '';
                    $image->title = ''; 
                    $image->save();
                }
            }

            if ($request->has('tags')) {
                $tagIds = [];
                Log::info($request->tags);
                foreach ($request->tags as $tagName) {
                    $tag = Tag::firstOrCreate(['name' => $tagName]);
                    $tagIds[] = $tag->id;
                }
                $place->tags()->sync($tagIds); // Przypisz tagi do miejsca
            }

            // Commit the transaction
            DB::commit();
            return response()->json(['message' => 'Form submitted successfully'], 200);
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Form submission error: ' . $e->getMessage());

            // Return an error response to the frontend
            return response()->json(['error' => 'There was an error submitting the form. Please try again later.'], 500);
        }
    }
}
