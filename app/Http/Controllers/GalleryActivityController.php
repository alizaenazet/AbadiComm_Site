<?php

namespace App\Http\Controllers;

use App\Models\GalleryActivity;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class GalleryActivityController extends Controller
{
    
    public function showGalleryList(){
        return view("components.pages.admin.gallery-list")
        ->with('galleries',GalleryActivity::all());
    }

    public function uploadGallery(Request $request){
        $request->validate([
            'fileImage'=> 'required',
            'description' => 'required'
        ]);
        Validator::validate($request->all(),[
            'fileImage' => [
                File::image()
                    ->max('25mb')
            ]
        ]);
        
        $file = $request->file('fileImage');
        $ImageUrl = '/storage/'. $file->storePublicly('gallery_activity', 'public');

        GalleryActivity::create([
            'image_url'=> $ImageUrl,
            'content' => $request['description']
        ]);

        return redirect('/dashboard/galleries/');
    }
}
