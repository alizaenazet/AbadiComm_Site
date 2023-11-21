<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsappController extends Controller
{
    public function redirectClientContact(Request $req){
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
    }

    public function redirectPartnerContact(Request $req){
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
    }
}
