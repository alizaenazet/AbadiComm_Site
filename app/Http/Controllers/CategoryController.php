<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(Request $request){
        $request->validate([
            "categoryName"=> "required|min:3",
        ]);

        $category = Category::create([
            'name' => $request['categoryName'],
        ]);

        if (is_object($category)) {
            return back()->with("categoryStatus","kategori berhasil ditambahkan");
        }
        return back()->with("categoryStatus","kategori gagal ditambahkan");
    }

    public function delete(Category $category){
        if (is_object($category)) {
            $category->delete();
            return back()->with("categoryStatus","kategori berhasil dihapus");
        }
        return back()->with("categoryStatus","kategori gagal dihapus");
    }
}
