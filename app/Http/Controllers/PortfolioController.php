<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

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

        $portfolios = [];
        $categoriesFilterNameList = [];
        $categories = [];
        $tempCategories = Category::all();
        if (strlen($data['categoriesFilter']) > 0) {
            foreach ($tempCategories as $key => $category) {
                if (in_array($category->id, $categoriesIdFilter)) {
                   
                    if (!in_array($category->name,$categoriesFilterNameList)) {
                        array_push($categoriesFilterNameList,$category->name);
                    }

                    array_push($categories, $category);
                }
            }        
        
        foreach ($categories as $key => $category) {
            foreach($category->portfolios as $key => $valuePortfolios) {
            array_push($portfolios, $valuePortfolios);
            }
        }
        }
    //    
        if (strlen($data['yearsFilter']) > 0) {
            if ($categoriesIdFilter[0] == null) {
                // $portfolioByYear = DB::table('portfolios')->whereRaw('YEAR(`date`) in ?', '(2021,2012,2015,2020)')->get();
                // $portfolioByYear = Portfolio::whereRaw('YEAR(`date`) in ?', '(2021,2012,2015,2020)')->get(); have same result
                $portfolioByYear = array();
                foreach (Portfolio::all() as $key => $portfolio) {
                    if (in_array($portfolio->year(),$yearsIdFilter)) {
                        array_push($portfolios, $portfolio);
                    }
                }
                array_push($portfolios,...$portfolioByYear);
            }else{
                $portfolioByYear = Portfolio::whereNotIn('id',$categoriesIdFilter)
                ->get();
                foreach ($portfolioByYear as $key => $portfolio) {
                    if (in_array($portfolio->year(),$yearsIdFilter)) {
                        array_push($portfolios, $portfolio);
                    }
                }
        }}
        
        

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
