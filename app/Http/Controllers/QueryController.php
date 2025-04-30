<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\QuerySubmitted;

class QueryController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'query' => 'required|string',
        ]);

        // Send email
        Mail::to('admin@arthaatsite.com')->send(new QuerySubmitted($validated));

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your query has been submitted successfully!');
    }
}