<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\StoreTenantRequest;
use App\Http\Resources\Tenant\TenantCollection;
use App\Models\Tenant;
use Exception;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index(Request $request)
    {
        $tenants = Tenant::all();

        return response()->json([
            'message' => 'Tenants retived successfully',
            'data' => new TenantCollection($tenants),
        ]);
    }
    
    public function store(StoreTenantRequest $request)
    {
        $validateData = $request->validated();

        try {
            $imagePath = null;

            if ($request->hasFile("image")) {
                $imagePath = $request->file("image")->store("tenant", 'public');
            }

            $tenant = Tenant::create([
                'name' => $validateData['name'],
                'phone' => $validateData['phone'],
                'image' => $imagePath,
            ]);

            return response()->json([
                'message' => 'Tenant Created Successfully',
                'data' => $tenant
            ], 201);
            
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Tenant Creation Failed.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
