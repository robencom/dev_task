<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagesController extends Controller
{

    public function index()
    {
    	return view('images.upload');
    }    

    public function upload(Request $request)
    {
    	$this->validate($request, [
            'uploaded_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);


    	if ($request->hasFile('uploaded_image')) {

	        $image = $request->file('uploaded_image');

            $name = str_random(10) . '.' . $image->getClientOriginalExtension();

	        $destinationPath = public_path('storage');

	        $s = $image->move($destinationPath, $name);

        	return redirect('/upload')->with('alert-success','Image Upload successfully!!');

    	} else {
    		
    		return redirect('/upload')->withErrors(['message' => 'Could not upload the image!']);

    	}

    }

    public function show()
    {

        $images = [];
        $files = \Storage::files('/public');

        array_shift($files); //to eliminate the gitignore file..

        foreach ($files as $name) {
            
            $images[] = substr($name, 7);

        }

        return view('images.show')->with('images', $images);

    }


}
