<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Http\Resources\MembersCollection;
use App\Models\Member;
use Exception;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return response()->json([
            'message' => 'Members retrived successfully',
            'data' => new MembersCollection($members),
        ]);
    }

    public function store(MemberRequest $request)
    {
        $validateData = $request->validated();

        try {
            $member = Member::create([
                'name' => $validateData['name'],
                'email' => $validateData['email'],
                'role' => $validateData['role'],
                'status' => $validateData['status'],
            ]);
            return response()->json([
                'message' => 'Member Created Successfully',
                'new-member-data' => $member,
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'member data creation failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $member = Member::findOrFail($id);
            return response()->json([
                'message' => 'Member retruved successfully',
                'member-data' => $member,
            ], 201);
        } catch (Exception $error) {
            return response()->json([
                "message" => "Member Faild to Show",
                "error" => $error->getMessage(),
            ]);
        }
    }

    public function update(MemberRequest $request, $id){
        $validated = $request->validated();

        try{
           $member = Member::findOrFail($id);

           $member->update([
                "name"=> $validated["name"],
                "email"=> $validated["email"],
                "role"=> $validated["role"],
                "status"=> $validated["status"],
           ]);
           return response()->json([
                "message"=> "Member Updated Successfully",
                "updated_member" => $member,
           ], 200);
        }catch(Exception $error) {
            return response()->json([
                "message"=> "Member failed to update",
                "error"=> $error->getMessage(),
            ], 500);
        }
    }

    public function destroy($id){
        $member = Member::findOrFail($id)->delete();
        return response()->json([
            "message"=> "Member Deleted Successfully",
        ]);
    }
}
