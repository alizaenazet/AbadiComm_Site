<?php

namespace App\Http\Controllers;

use App\Models\PortfolioImage;
use App\Models\PortfolioPromoter;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
    public function filter(Request $req)  {

        if (empty($req['categoriesFilter']) && empty($req['yearsFilter']) ) {
            $req->validate([
                "categoriesFilter" => 'required',
                "yearsFilter" => 'required',
            ]);
            



        }
        $data = $req;
        $categoriesIdFilter = array();
        $yearsIdFilter = array();

        if (!str_contains($data['categoriesFilter'],",")) {
            $categoriesIdFilter = array($data['categoriesFilter']);
        }else {
            $categoriesIdFilter = explode(",",$data['categoriesFilter']);
        };

        if (!str_contains($data['yearsFilter'],",")) {
            $yearsIdFilter = array($data['yearsFilter']);
        }else{
            $yearsIdFilter = explode(",",$data['yearsFilter']);
        }

        $portfolios = [];
        $categoriesFilterNameList = [];
        $categories = [];
        $tempCategories = Category::all();
        if (strlen($data['categoriesFilter']) > 0) {
            foreach ($tempCategories as $key => $category) {
                if (in_array($category->id, $categoriesIdFilter)) {
                   
                    if (!in_array($category->name,$categoriesFilterNameList)) {
                        array_push($categoriesFilterNameList,$category->name);
                    }

                    array_push($categories, $category);
                }
            }        
        
        foreach ($categories as $key => $category) {
            foreach($category->portfolios as $key => $valuePortfolios) {
            array_push($portfolios, $valuePortfolios);
            }
        }
        }
    //    
        if (strlen($data['yearsFilter']) > 0) {
            if ($categoriesIdFilter[0] == null) {
                // $portfolioByYear = DB::table('portfolios')->whereRaw('YEAR(`date`) in ?', '(2021,2012,2015,2020)')->get();
                // $portfolioByYear = Portfolio::whereRaw('YEAR(`date`) in ?', '(2021,2012,2015,2020)')->get(); have same result
                $portfolioByYear = array();
                foreach (Portfolio::all() as $key => $portfolio) {
                    if (in_array($portfolio->year(),$yearsIdFilter)) {
                        array_push($portfolios, $portfolio);
                    }
                }
                array_push($portfolios,...$portfolioByYear);
            }else{
                $portfolioByYear = Portfolio::whereNotIn('id',$categoriesIdFilter)
                ->get();
                foreach ($portfolioByYear as $key => $portfolio) {
                    if (in_array($portfolio->year(),$yearsIdFilter)) {
                        array_push($portfolios, $portfolio);
                    }
                }
        }}
        
        

        $years = range(2018,date("Y"));
        return view('components.pages.list-portfolio')
        ->with('portfolios', $portfolios)
        ->with('years', $years)
        ->with('categories', $tempCategories)
        ->with('categoriesFilterList',$data['categoriesFilter'])
        ->with('categoriesFilterNameList', $categoriesFilterNameList)
        ->with('yearFilterList', $data['yearsFilter']);
    }


    public function showPortfolioList(){
        return view('components.pages.admin.portfolio-list')
        ->with('categories', Category::all()->sortByDesc('updated_at'))
        ->with('portfolios', Portfolio::all()->sortByDesc('updated_at'));
    }

    public function create(Request $req){
        $req->validate([
            "categories" => 'required',
            "promoters" => 'required',
            'portfolioTitle' => 'required',
            'time' => 'required',
            "imageFiles" => 'required',
            "imageFiles.*" => 'mimes:jpeg,jpg,png|max:25000',
        ]);

        $promoters = array();
        $categories = array();
        if (!str_contains($req['categories'],",")) {
            $categories = array($req['categories']);
        }else {
            $categories = explode(",",$req['categories']);
        };

        if (!str_contains($req['promoters'],",")) {
            $promoters = array($req['promoters']);
        }else {
            $promoters = explode(",",$req['promoters']);
        };

        $portfolio = Portfolio::create([
            'title' => $req['portfolioTitle'],
            'content' => $req['description'],
            'date' => $req['time']
        ]);
        // $portfolio->title = $req['portfolioTitle'];
        // $portfolio->content = $req['description'];
        // $portfolio->date = $req['time'];

        

        foreach ($promoters as $key => $promoterName) {
            $portfolio->portfolioPromoter()->create([
                'name' => $promoterName,
                'portfolio_id' => $portfolio->id
            ]);
        }
        foreach ($categories as $key => $categoriesId) {
            $portfolio->categories()->attach($categoriesId);
        }

        if($req->hasfile('imageFiles')) {
            foreach($req->file('imageFiles') as $file)
            {
                $imageUrl = '/storage/'. $file->storePublicly('portfolio_images/'.$portfolio->id, 'public');
                $portfolio->portfolioImage()->create([
                    'image_url' => $imageUrl,
                    'portfolio_id' => $portfolio->id
                ]);
            }
        }

        if ($portfolio->save()) {
            return redirect('/dashboard/portfolios');
        }
        return back()->with('status','gagal membuat portfolio');
    }

    public function delete(Portfolio $portfolio){
        if (!is_object($portfolio)) {
           return  back()->with('portfolioStatus', 'portfolio gagal dihapus');
        }
        $currentPortfolioImages = $portfolio->portfolioImage;

        if (!$portfolio->delete()) {
            return  back()->with('portfolioStatus', 'portfolio gagal dihapus');
        }

        foreach ($currentPortfolioImages as $image) {
            $imagePath = str_replace("/storage/",'',$image->image_url);
            Storage::disk('public')->delete($imagePath);
        }

        return  back()->with('portfolioStatus', 'portfolio berhasil dihapus');
    }

    public function changeImage(PortfolioImage $image,Request $request){
        $request->validate([
            'fileImage'
        ]);
        Validator::validate($request->all(),[
            'fileImage' => [
                File::image()
                ->max('25mb')
                ]
            ]);
        $deletedImagePath = str_replace("/storage/",'',$image->image_url);
        $file = $request->file('fileImage');
        $newImageUrl = '/storage/'. $file->storePublicly('portolio_image', 'public');
        $image->image_url = $newImageUrl;
        if ($image->save()) {
            Storage::disk('public')->delete($deletedImagePath);
            return back()->with("portfolioStatus","image berhasil diperbarui"); 
        }
            return back()->with("portfolioStatus","image gagal diperbarui"); 
    }
    public function deleteImage(PortfolioImage $image){
        $deletedImagePath = str_replace("/storage/",'',$image->image_url);
        if ($image->delete()) {
            Storage::disk('public')->delete($deletedImagePath);
            return back()->with("portfolioStatus","image berhasil dihapus"); 
        }
        return back()->with("portfolioStatus","image gagal dihapus"); 
    }

}
