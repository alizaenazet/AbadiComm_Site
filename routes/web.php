<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\GalleryActivity;
use App\Models\Portfolio;
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

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }else{
        return view('components.pages.login') ;
    }
})->name('login');

Route::get('/forget-password',[UserController::class,'resetChooseEmail']);
Route::post('/forger-password/notice',[UserController::class,'sendEmail']);
Route::post('/reset-password',[UserController::class,'resetPassword']);
Route::get('/reset-password/{token}', function (string $token,Request $request) {
    return view('components.pages.reset-password-from')
    ->with('token',$token)->with('email',$request->query('email'));
})->name('password.reset');
Route::post('/login',[UserController::class,'login']);
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');
Route::post('/reset',[UserController::class,'resetPassword']);
Route::get('/dashboard',function () {
   return view('dashboard');
})->middleware('auth')->name('dashboard');