<?php

use App\Models\Category;
use App\Models\GalleryActivity;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
use App\Models\TeamMember;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/gallery',function () {
    $galleries = GalleryActivity::all();

   return view('components.pages.gallery')
                ->with('galleries', $galleries);
});

Route::get('/partner', function () {
    return view('components.pages.partner');
});

Route::get('/team-member', function () {
    $members = TeamMember::all();

    return view('components.pages.team-member')
                    ->with('members', $members);
});

Route::get('/list-portfolio',function(){
    $portfolios = Portfolio::all();
    $categories = Category::all();
    // $years = collectPortfoliosYear($portfolios);
    $years = array(2023,2022,2021);
    return view('components.pages.list-portfolio')
                    ->with('portfolios', $portfolios)
                    ->with('years', $years)
                    ->with('categories', $categories)
                    ->with('categoriesFilterList','')
                    ->with('categoriesFilterNameList', [])
                    ->with('yearFilterList', '');
});

function collectPortfoliosYear($portfolios,$years = []) {
    $years = array(1,2,3);
    foreach ($portfolios as $portfolio) {
        if (!in_array($portfolio->year(),$years)) {
            $years = array_push($years,$portfolio->year());
        }
    }
    return $years;
}

Route::put('/list-portfolio/filter',function (Request $req)  {
    if (strlen($req['categoriesFilter']) > 1) {
        return view('welcome');
    }
    
    return view('components.pages.partner');
});