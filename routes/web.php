<?php

use App\Http\Controllers\PortfolioController;
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
    $years = range(2018,date("Y"));
    return view('components.pages.list-portfolio')
                    ->with('portfolios', $portfolios)
                    ->with('years', $years)
                    ->with('categories', $categories)
                    ->with('categoriesFilterList','')
                    ->with('categoriesFilterNameList', [])
                    ->with('yearFilterList','');
});



Route::put('/list-portfolio/filter',[PortfolioController::class,'filter']);