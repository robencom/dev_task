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

	        $destinationPath = public_path('images');

	        $s = $image->move($destinationPath, $name);

	        //dd($image, $name, $destinationPath, $s);

        	return redirect('/upload')->with('success','Image Upload successfully!!');

    	} else {
    		
    		return redirect('/upload')->withErrors(['message' => 'Could not upload the image!']);

    	}

    }


}
