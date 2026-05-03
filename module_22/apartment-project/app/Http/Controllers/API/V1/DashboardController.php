<?php

namespace App\Http\Controllers\APi\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Apartment\ApartmentResource;
use App\Models\Apartment;
use App\Models\Booking;
use App\Models\Tenant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function summary(){
        return response()->json([
            'total_apartments' => Apartment::count(),
            'total_tenants'=> Tenant::count(),
            'total_booked_apartments'=> ApartmentResource::collection(
                Apartment::whereHas('currentBooking')->get()
            ),
            'total_vacant_apartments'=> ApartmentResource::collection(
                Apartment::whereDoesntHave('currentBooking')->get()
            ),
        ]);
    }
}
