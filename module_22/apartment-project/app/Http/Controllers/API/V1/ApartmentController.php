<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apartment\StoreApartmentRequest;
use App\Http\Resources\Apartment\ApartmentCollection;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Exception;

class ApartmentController extends Controller
{
    public function index(Request $request)
    {
        $apartments = Apartment::with('currentBooking.tenant')->get();
        return response()->json([
            'message' => 'Aparments retived successfully',
            'data' => new ApartmentCollection($apartments),
        ]);
    }

    public function store(StoreApartmentRequest $request)
    {
        $validateData = $request->validated();

        try {
            $imagePath = null;

            if ($request->hasFile("image")) {
                $imagePath = $request->file("image")->store("apartment", 'public');
            }

            $apartment = Apartment::create([
                'name' => $validateData['name'],
                'rent' => $validateData['rent'],
                'image' => $imagePath,
            ]);

            return response()->json([
                'message' => 'Apartment Created Successfully',
                'data' => $apartment
            ], 201);
            
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Apartment Creation Failed.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
