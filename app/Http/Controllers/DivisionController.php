<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;

class DivisionController extends Controller
{
    public function create(Request $request){
        $request->validate([
            "divisionName"=> "required|min:3",
        ]);
        Division::create([
            "name"=> $request->divisionName
        ]);
        return back()->with("divisionStatus","divisi berhasil ditambahkan");
    }

    public function delete(Division $division) {
        $division->delete();
        return back()->with("divisionStatus","divisi berhasil dihapus");
    }
}
