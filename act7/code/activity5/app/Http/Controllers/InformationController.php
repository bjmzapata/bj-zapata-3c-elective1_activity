<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function showForm()
    {
        return view('profile-information');
    }
    public function handleForm(Request $request)
    {
        $validated=$request->validate([
            'first_name'   => 'required|string|max:50',
            'last_name'    => 'required|string|max:50',
            'sex'          => 'required|in:Male,Female', 
            'mobile_phone' => 'required|regex:/^\d{4}-\d{3}-\d{3}$/',
            'tel_no'       => 'numeric',
            'birth_date'   => 'required|date|date_format:Y-m-d',
            'address'      => 'max:100',
            'email'        => 'email',
            'website'      => 'url',
        ]);
        
        return back()->with('success','Form submitted successfully!');
    }
}
