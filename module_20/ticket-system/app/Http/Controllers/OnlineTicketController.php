<?php

namespace App\Http\Controllers;

use App\Models\OnlineTicket;
use Illuminate\Http\Request;

class OnlineTicketController extends Controller
{
    public function create(){
        return view('online_tickets.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'priority' => 'required|string|in:low,medium,high',
        ]);
        
        $validated['user_id'] = auth()->id();

        OnlineTicket::create($validated);
        

        return redirect()->route('dashboard')->with('success', 'Online ticket created successfully.');
    }
}
 