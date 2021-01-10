<?php


namespace App\Http\Controllers\FrontEnd;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request)
    {
          $products = Product::where('name','LIKE','%'.$request->key.'%')->get();
          return  view('frontend.shoplist.index',compact('products'));
    }
    public  function  searhByCategory(Request $request)
    {
        $categories = Category::all();
        $products = Product::where('category_id',$request->id)->get();
        return  view('frontend.shoplist.index',compact('products','categories'));
    }
}
