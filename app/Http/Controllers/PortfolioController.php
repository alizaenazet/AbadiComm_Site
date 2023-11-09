<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Category;


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

         
        $categoriesFilterNameList = [];
        $categories = [];
            $tempCategories = Category::all();
            foreach ($tempCategories as $key => $category) {
                if (in_array($category->id, $categoriesIdFilter)) {
                   
                    if (!in_array($category->name,$categoriesFilterNameList)) {
                        array_push($categoriesFilterNameList,$category->name);
                    }

                    array_push($categories, $category);
                }
            }        
        
        $portfolios = [];
        foreach ($categories as $key => $category) {
            foreach($category->portfolios as $key => $valuePortfolios) {
            array_push($portfolios, $valuePortfolios);
            }
        }
       
        if (!empty($data['yearsFilter'])) {
            $portfolioById = Portfolio::whereNotIn('id',$categoriesIdFilter)
                ->whereYear('date',$yearsIdFilter)->get();
            if (!empty($portfolioById)) {
                array_push($portfolios,...$portfolioById);
            }
        }
        
        $years = range(2018,date("Y"));
        return view('components.pages.list-portfolio')
        ->with('portfolios', $portfolios)
        ->with('years', $years)
        ->with('categories', $tempCategories)
        ->with('categoriesFilterList',$data['categoriesFilter'])
        ->with('categoriesFilterNameList', $categoriesFilterNameList)
        ->with('yearFilterList', $data['yearsFilter']);
    }


}
