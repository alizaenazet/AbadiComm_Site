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

    // ✅ CONVERT TO WEBP AND COMPRESS ON UPLOAD
    public function uploadGallery(Request $request){
        $request->validate([
            'fileImage'=> 'required',
            'description' => 'required'
        ]);
        Validator::validate($request->all(),[
            'fileImage' => [
                File::image()->max('10mb')
            ]
        ]);

        $file = $request->file('fileImage');

        // Get original filename without extension and sanitize it
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        // Replace spaces and special chars with underscores
        $sanitizedFilename = preg_replace('/[^A-Za-z0-9\-_]/', '_', $originalFilename);

        // Read image and convert to WebP
        $manager = $this->getImageManager();
        $img = $manager->read($file);

        // Resize to max 1280px width and encode to WebP with 80% quality
        $webpImage = $img->scaleDown(width: 1280)->toWebp(80);

        // Generate unique WebP filename
        $uniqueId = time() . uniqid();
        $webpName = 'gallery_activity/' . $sanitizedFilename . '_' . $uniqueId . '.webp';

        // Store the WebP image
        Storage::disk('public')->put($webpName, (string) $webpImage);

        $ImageUrl = '/storage/' . $webpName;

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

    // ✅ CONVERT TO WEBP AND COMPRESS ON UPDATE
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
                        File::image()->max('10mb')
                    ]
                ]);

                $deletedImagePath = str_replace("/storage/",'',$galleryActivity->image_url);
                $file = $request->file('fileImage');

                // Get original filename without extension
                $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

                // Read image and convert to WebP
                $manager = $this->getImageManager();
                $img = $manager->read($file);

                // Resize to max 1920px width and encode to WebP with 80% quality
                $webpImage = $img->scaleDown(width: 1920)->toWebp(80);

                // Generate unique WebP filename
                $webpName = 'gallery_activity/' . $filename . '_' . uniqid() . '.webp';

                // Store the WebP image
                Storage::disk('public')->put($webpName, (string) $webpImage);

                $newImageUrl = '/storage/' . $webpName;
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
