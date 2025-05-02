<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function create()
    {
        $photos = Photo::latest()->paginate(12); 
        return view('upload', compact('photos'));
    }
    
    
    public function storeSingle(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
    
        $image = $request->file('image');
        $name = time().'_'.$image->getClientOriginalName();
        $image->move(public_path('images'), $name);
    
        Photo::create(['image' => $name]);
    
        return redirect()->route('photos.create')->with('success', 'Image uploaded successfully!');
    }
    
    public function storeMultiple(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
    
        foreach ($request->file('images') as $image) {
            $name = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('images'), $name);
            Photo::create(['image' => $name]);
        }
    
        return redirect()->route('photos.create')->with('success', 'Images uploaded successfully!');
    }
  
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        $imagePath = public_path('images/' . $photo->image);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $photo->delete();

        return back()->with('success', 'Photo deleted successfully.');
    }
}
