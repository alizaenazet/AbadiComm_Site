<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\GalleryActivityController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\GalleryActivity;
use App\Models\Portfolio;
use App\Models\TeamMember;
use App\Models\Division;
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

Route::get('/', function (){
    $members = TeamMember::all();
    return view('welcome')->with('members', $members);
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
    $years = range(2018,date("Y"));
    return view('components.pages.list-portfolio')
                    ->with('portfolios', $portfolios)
                    ->with('years', $years)
                    ->with('categories', $categories)
                    ->with('categoriesFilterList','')
                    ->with('categoriesFilterNameList', [])
                    ->with('yearFilterList','');
});

Route::get('/portfolio/{portfolioId}', function (string $portfolioId){
    $portfolio = Portfolio::findOrFail($portfolioId);
    return view('components.pages.portfolio')->with('portfolio', $portfolio);
});

Route::post('/whatsapp-redirect/contact', function (Request $req) {
    $req->validate([
        'nama'=> 'required',
        'opsiInstansi'=> 'required',
        'opsiKeperluan' => 'required',
    ]);

    if ($req['opsiInstansi'] != '0') {
        $req->validate([
            'namaInstansi'=> 'required',
        ]);
    }

    if ($req['opsiKeperluan'] == '0') {
        $req->validate([
            'keperluan'=> 'required',
        ]);
    }
    $data = $req;
    $namaInstansi = "";
    $keperluan = "";

    if ($data['opsiInstansi'] != "0") {
        $namaInstansi = $data['namaInstansi'];
    }

    switch ($data['opsiKeperluan']) {
        case '0':
            $keperluan = $data['keperluan'];
            break;
        case '1':
            $keperluan = "Membuat event";
            break;
        case '2':
            $keperluan = "Kebutuhan event";
            break;
        
        default:
            # code...
            break;
    }

    $pesanInstansi = 'Perkenalkan, saya '.$data['nama'];
    $pesanKeperluan = "saya ingin ".$keperluan.".";
    $pesanInformasiTambahan = "";

    if ($data['opsiInstansi'] != '0') {
        $pesanInstansi = $pesanInstansi . " dari ". $namaInstansi . ".";
    }else{
        $pesanInstansi = $pesanInstansi . ".";
    }

    if (!empty($data['addtional_information'])) {
        $pesanInformasiTambahan = "Informasi tambahan:%0A".$data['addtional_information'].".";
    }


    $message = "Selamat pagi, siang, atau malam. Semoga Anda sehat dan bahagia.%0A".
        $pesanInstansi." ".$pesanKeperluan."%0A%0A".$pesanInformasiTambahan."%0A Senang dapat menghubungi anda.%0ATerimakasih"
    ;
    // $message = str_replace(" ","%20",$message);
    $directWhatsappUrl = 'https://api.whatsapp.com/send/?phone=6281331720920&text='.$message.'&type=phone_number&app_absent=0';
    return redirect()->away($directWhatsappUrl);
});

Route::post('whatsapp-redirect/partner', function (Request $req) {
    $req->validate([
        'nama'=> 'required',
        'namaPerusahaanInstitusi' => 'required',
        'opsiPenawaran' => 'required',
    ]);

    $penawaran = "";
    if ($req['opsiPenawaran'] == '0') {
        $req->validate([
            'penawaran' => 'required'
        ]);
        $penawaran = $req['penawaran'];
    }else {
        switch ($req['opsiPenawaran']) {
            case '1':
                $penawaran = "Barang";
                break;
            
            default:
                $penawaran = "Jasa";
                break;
        }
    }

    $pesanNamaDanInstansi = "salam saya " . $req['nama'] . " dari " .$req['namaPerusahaanInstitusi'];
    $pesanPenawaran = "Saya memiliki penawaran " . $penawaran . ".%0A";
    $pesanInformasiPenawaran = "berikut informasi terkait penawaran saya: %0A " . $req['informasiPenawaran'] ."%0A";

    $message = $pesanNamaDanInstansi . "%0A" . $pesanPenawaran;
    if (!empty($req['informasiPenawaran'])) {
        $message = $message . $pesanInformasiPenawaran;
    }
    $message = $message . "Senang dapat menghubungi anda.%0A Terimakasih";
    $directWhatsappUrl = 'https://api.whatsapp.com/send/?phone=6281331720920&text='.$message.'&type=phone_number&app_absent=0';
    return redirect()->away($directWhatsappUrl);
});


Route::put('/list-portfolio/filter',[PortfolioController::class,'filter']);

Route::get('/list-portfolio/filter',function ()  {
    return redirect('/list-portfolio');
});

// Auth 
Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }else{
        return view('components.pages.login') ;
    }
})->name('login');
Route::get('/reset-password/{token}', function (string $token,Request $request) {
    return view('components.pages.reset-password-from')
    ->with('token',$token)->with('email',$request->query('email'));
})->name('password.reset');
Route::get('/dashboard',function () {
   return view('dashboard');
})->middleware('auth')->name('dashboard');
Route::get('/forget-password',[UserController::class,'resetChooseEmail']);
Route::post('/forger-password/notice',[UserController::class,'sendEmail']);
Route::post('/reset-password',[UserController::class,'resetPassword']);
Route::post('/login',[UserController::class,'login']);
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');
Route::post('/reset',[UserController::class,'resetPassword']);

// Gallery
Route::get('/dashboard/galleries',[GalleryActivityController::class,'showGalleryList'])->middleware('auth');
Route::get('/dashboard/galleries/create', function () {
    return view('components.pages.admin.create-gallery');
})->middleware('auth');;
Route::get('/dashboard/galleries/{galleryActivity}/update', function (GalleryActivity $galleryActivity) {
    return view('components.pages.admin.update-gallery')
    ->with('gallery', $galleryActivity );
})->middleware('auth');;
Route::post('/dashboard/galleries/create', [GalleryActivityController::class,'uploadGallery'])->middleware('auth');
Route::put('/dashboard/galleries/{galleryActivity}', [GalleryActivityController::class,'updateGallery'])->middleware('auth');
Route::delete('/dashboard/galleries/{galleryActivity}', [GalleryActivityController::class,'deleteGallery'])->middleware('auth');

// Team Member
Route::get('/dashboard/team-members',[TeamMemberController::class,'showTeamList'])->middleware('auth');
Route::get('/dashboard/team-members/create',function (){
    return view('components.pages.admin.create-team-member')->with('divisions',Division::all()->sortByDesc('updated_at'));
})->middleware('auth');
Route::get('/dashboard/team-members/{teamMember}/update',function (TeamMember $teamMember){
    return view('components.pages.admin.update-team-member')
    ->with('member',$teamMember)
    ->with('divisions',Division::all()->sortByDesc('updated_at'));
})->middleware('auth');
Route::post('/dashboard/team-member/create',[TeamMemberController::class,'create'])->middleware('auth');
Route::delete('/dashboard/team-member/{teamMember}',[TeamMemberController::class,'delete'])->middleware('auth');
Route::put('/dashboard/team-member/{teamMember}',[TeamMemberController::class,'update'])->middleware('auth');

// Division
Route::post('/dashboard/division/create',[DivisionController::class,'create'])->middleware('auth');
Route::delete('/dashboard/division/{division}',[DivisionController::class,'delete'])->middleware('auth');

// Portfolio
Route::get('/dashboard/portfolios',[PortfolioController::class,'showPortfolioList'])->middleware('auth');
Route::get('/dashboard/portfolios/create',function (){
    return view('components.pages.admin.create-portfolio')
    ->with('categories', Category::all()->sortByDesc('updated_at'));
})->middleware('auth');
Route::post('/dashboard/portfolios/create',[PortfolioController::class,'create'])->middleware('auth');
Route::delete('/dashboard/portfolios/{portfolio}',[PortfolioController::class,'delete'])->middleware('auth');
Route::put('/dashboard/portfolios/image/{image}/change',[PortfolioController::class,'changeImage'])->middleware('auth');
Route::delete('/dashboard/portfolios/image/{image}/delete',[PortfolioController::class,'deleteImage'])->middleware('auth');


// Category
Route::post('/dashboard/categories/create',[CategoryController::class,'create'])->middleware('auth'); 
Route::delete('/dashboard/categories/{category}',[CategoryController::class,'delete'])->middleware('auth'); 