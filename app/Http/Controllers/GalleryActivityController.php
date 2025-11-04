<?php

namespace App\Http\Controllers;

use App\Models\GalleryActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class GalleryActivityController extends Controller
{
    // Helper method to get ImageManager
    private function getImageManager()
    {
        try {
            return new ImageManager(new \Intervention\Image\Drivers\Imagick\Driver());
        } catch (\Exception $e) {
            return new ImageManager(new Driver());
        }
    }

    public function showGalleryList(){
        return view("components.pages.admin.gallery-list")
        ->with('galleries',GalleryActivity::all()->sortByDesc('updated_at'));
    }

    // ✅ COMPRESS ON UPLOAD
    public function uploadGallery(Request $request){
        $request->validate([
            'fileImage'=> 'required',
            'description' => 'required'
        ]);
        Validator::validate($request->all(),[
            'fileImage' => [
                File::image()->max('25mb')
            ]
        ]);

        $file = $request->file('fileImage');

        // COMPRESS BEFORE STORING
        $manager = $this->getImageManager();
        $compressed = $manager->read($file)
            ->scaleDown(width: 1280)  // Max 1920px wide, keeps aspect ratio
            ->toJpeg(quality: 75);    // 75% quality

        $filename = 'gallery_activity/' . uniqid() . '.jpg';
        Storage::disk('public')->put($filename, (string) $compressed);

        $ImageUrl = '/storage/' . $filename;

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

    // ✅ COMPRESS ON UPDATE
    public function updateGallery(GalleryActivity $galleryActivity, Request $request){
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
                        File::image()->max('25mb')
                    ]
                ]);

                $deletedImagePath = str_replace("/storage/",'',$galleryActivity->image_url);
                $file = $request->file('fileImage');

                // COMPRESS THE NEW IMAGE
                $manager = $this->getImageManager();
                $compressed = $manager->read($file)
                    ->scaleDown(width: 1920)
                    ->toJpeg(quality: 75);

                $filename = 'gallery_activity/' . uniqid() . '.jpg';
                Storage::disk('public')->put($filename, (string) $compressed);

                $newImageUrl = '/storage/' . $filename;
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
