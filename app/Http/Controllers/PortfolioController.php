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
use Illuminate\Database\Eloquent\Builder;


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
        $categoriesIdFilter =  $this->stringToArray($data['categoriesFilter']);
        $yearsFilter = $this->stringToArray($data['yearsFilter']);
        $portfolios = [];
        $tempCategories = Category::all();


        if (strlen($data['categoriesFilter']) > 0 && strlen($data['yearsFilter']) > 0) {
                $portfoliosByYears = Portfolio::whereHas('categories',function (Builder $query ) use($categoriesIdFilter) {
                    $query->whereIn('category_id',$categoriesIdFilter);
                })
                ->orWhereIn(DB::raw('YEAR(`date`)'), $yearsFilter)
                ->get();
                array_push($portfolios, ...$portfoliosByYears);
            }else if(strlen($data['categoriesFilter']) > 0 && !strlen($data['yearsFilter']) > 0){
                $portfoliosByYears = Portfolio::whereHas('categories',function (Builder $query ) use($categoriesIdFilter) {
                    $query->whereIn('category_id',$categoriesIdFilter);
                })->get();
                array_push($portfolios, ...$portfoliosByYears);
            }else{
                $portfoliosByYears = Portfolio::whereIn(DB::raw('YEAR(`date`)'), $yearsFilter)
                ->get();
                array_push($portfolios, ...$portfoliosByYears);
            }

            
        $years = Portfolio::select(DB::raw('YEAR(`date`) as year'))->get();
        return view('components.pages.list-portfolio')
        ->with('portfolios', $portfolios)
        ->with('years', $years)
        ->with('categories', $tempCategories)
        ->with('categoriesFilterList',$data['categoriesFilter'])
        ->with('yearFilterList', $data['yearsFilter'])
        ->with('categoriesFilterNameList', $tempCategories->whereIn('id',$categoriesIdFilter)->all());
    }

    public function showPortfolioListPage(){
        $portfolios = Portfolio::all()->sortByDesc('updated_at');
        $categories = Category::all();
        $years = Portfolio::select(DB::raw('YEAR(`date`) as year'))->get();;
        return view('components.pages.list-portfolio')
                        ->with('portfolios', $portfolios)
                        ->with('years', $years)
                        ->with('categories', $categories)
                        ->with('categoriesFilterList','')
                        ->with('categoriesFilterNameList', [])
                        ->with('yearFilterList','');
    }

    public function showPortfolioList(){
        return view('components.pages.admin.portfolio-list')
        ->with('categories', Category::all()->sortByDesc('updated_at'))
        ->with('portfolios', Portfolio::all()->sortByDesc('updated_at'));
    }

    public function editPortfolioPage(Portfolio $portfolio){
        $tempPromoters = $portfolio->portfolioPromoter()->select('name')->get()->toArray();
   $currentPromoters = implode(',',array_column($tempPromoters,'name'));    
    $tempCategories = $portfolio->categories->toArray() ;
    $currentCategories = implode(',',array_column($tempCategories,'id'));
    return view('components.pages.admin.update-portfolio')
    ->with('portfolio', $portfolio)
    ->with('currentCategories', $currentCategories)
    ->with('currentPromoters', $currentPromoters)
    ->with('categories', Category::all()->sortByDesc('updated_at'));
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

        foreach ($promoters as $key => $promoterName) {
            $portfolio->portfolioPromoter()->create([
                'name' => $promoterName,
                'portfolio_id' => $portfolio->id
            ]);
        }
        foreach ($categories as $key => $categoryId) {
            $portfolio->categories()->attach($categoryId);
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

    public function update(Portfolio $portfolio,Request $req){

        
        $deletedImages = $this->stringToArray($req['deletedImage']);
        $changedFields = $this->stringToArray($req['changedFields']);
        $resetedFields = $this->stringToArray($req['resetedFields']);
        $portfolio->content = $req['description'];

        foreach ($resetedFields as $key => $fieldName) {
            if ($fieldName == 'promoters') {
                $portfolio->portfolioPromoter()->delete();
            }else{
                $portfolio->categories()->detach();
            }
        }

            foreach ($changedFields as $key => $field) {
                switch ($field) {
                    case 'title':
                        $req->validate([
                            'portfolioTitle' => 'required'
                        ]);
                        $portfolio->title = $req['portfolioTitle'];
                        break;
                    
                    case 'time':
                        $req->validate([
                            'time' => 'required'
                        ]);
                        $portfolio->date = $req['time'];
                        break;
                    case 'categories':
                        $req->validate([
                            'categories' => 'required'
                        ]);
                        $currentCategories = $this->stringToArray($req['categories']);
                        foreach ($currentCategories as $key => $categoryId) {
                            $portfolio->categories()->findOr($categoryId,function () use($portfolio,$categoryId) {
                                $portfolio->categories()->attach($categoryId);   
                            });
                        }

                        break;
                    case 'promoters':
                            $req->validate([
                                'time' => 'required'
                            ]);
                            $currentPromoters = $this->stringToArray($req['promoters']);
                            foreach ($currentPromoters as $key => $promoterName) {
                                $portfolio->portfolioPromoter()->firstOrCreate([
                                    'name' => $promoterName
                                ]);
                            }
                            break;
                    default:
                        # code...
                        break;
                }
            }

        if($req->hasfile('imageFiles')) {
            $req->validate([
                "imageFiles" => 'required',
                "imageFiles.*" => 'mimes:jpeg,jpg,png|max:25000',
            ]);
            foreach($req->file('imageFiles') as $file)
            {
                $imageUrl = '/storage/'. $file->storePublicly('portfolio_images/'.$portfolio->id, 'public');
                $portfolio->portfolioImage()->create([
                    'image_url' => $imageUrl,
                    'portfolio_id' => $portfolio->id
                ]);
            }
        }
        if (!(count($deletedImages) - $portfolio->portfolioImage()->count()) < 1) {
            foreach ($deletedImages as $key => $imageId) {
                $portfolioImage = PortfolioImage::find($imageId);
                $deletedImagePath = str_replace("/storage/",'',$portfolioImage->image_url);
                Storage::disk('public')->delete($deletedImagePath);
                $portfolioImage->delete();
            }
        }

        if ($portfolio->save()) {
            return redirect('/dashboard/portfolios')->with('portfolioStatus','berhasil update portfolio');
        }
        return back()->with('status','gagal update portfolio');
    }

    
    public function delete(Portfolio $portfolio){
        if (!is_object($portfolio)) {
           return  back()->with('portfolioStatus', 'portfolio gagal dihapus');
        }

        if (!$portfolio->delete()) {
            return  back()->with('portfolioStatus', 'portfolio gagal dihapus');
        }

        $dirPath = str_replace("/storage/",'','portfolio_images/'.$portfolio->id);
        Storage::deleteDirectory($dirPath);

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

    private function stringToArray($inputString){
        if (empty($inputString)) {
            return array();
        }
        if (!str_contains($inputString,",")) {
            return array($inputString);
        }else {
            return explode(",",$inputString);
        };
    }
}
