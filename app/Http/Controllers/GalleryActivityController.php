<?php

namespace App\Http\Controllers;

use App\Models\GalleryActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class GalleryActivityController extends Controller
{
    
    public function showGalleryList(){
        return view("components.pages.admin.gallery-list")
        ->with('galleries',GalleryActivity::all()->sortByDesc('updated_at'));
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
        Cache::forget('galleries');
        return redirect('/dashboard/galleries/');
    }

    public function deleteGallery(GalleryActivity $galleryActivity){
        $imagePath = str_replace("/storage/",'',$galleryActivity->image_url);
        Storage::disk('public')->delete($imagePath);
        $galleryActivity->delete();
        Cache::forget('galleries');
        return redirect('/dashboard/galleries/');
    }

    public function updateGallery(GalleryActivity $galleryActivity ,Request $request){
        $updatedField = array();
        if (is_null($request['updated'])) {
            return back()->withErrors(['notUpdated'=>'tidak ada pembaruan']);
        }
        if (!str_contains($request['updated'],",")) {
            $updatedField = array($request['updated']);
        }else {
            $updatedField = explode(",",$request['updated']);
        };
        for ($i=0; $i < count($updatedField); $i++) {
            if ($updatedField[$i] == 'fileImage') {
                $request->validate([
                    'fileImage'=> 'required',
                ]);
                Validator::validate($request->all(),[
                    'fileImage' => [
                        File::image()
                            ->max('25mb')
                    ]
                ]);
                $deletedImagePath = str_replace("/storage/",'',$galleryActivity->image_url);
                $file = $request->file('fileImage');
                $newImageUrl = '/storage/'. $file->storePublicly('gallery_activity', 'public');
                $galleryActivity->image_url = $newImageUrl;
                Storage::disk('public')->delete($deletedImagePath);
            }else {
                $request->validate([
                    'description' => 'required'
                ]);
                $galleryActivity->content = $request['description'];
            }
        }
        $galleryActivity->save();
        Cache::forget('galleries');
        return redirect('/dashboard/galleries');
    }
}
