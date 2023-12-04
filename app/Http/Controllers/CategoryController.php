<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


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
            Cache::forget('categories');
            return back()->with("categoryStatus","kategori berhasil ditambahkan");
        }
        return back()->with("categoryStatus","kategori gagal ditambahkan");
    }

    public function delete(Category $category){
        if (is_object($category)) {
            $category->delete();
            Cache::forget('categories');
            return back()->with("categoryStatus","kategori berhasil dihapus");
        }
        return back()->with("categoryStatus","kategori gagal dihapus");
    }
}
