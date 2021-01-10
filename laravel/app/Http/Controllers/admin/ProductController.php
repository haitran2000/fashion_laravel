<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Classes\Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('CheckAdminLogin');
        $this->viewprefix='admin.product.';
        $this->index='product.index';
    }
    public function index()
    {
        $products = Product::simplePaginate(5);
        $categorys = Category::all('id','name');
        return view($this->viewprefix.'index', compact('products','categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands=Brand::all();
        return view($this->viewprefix.'create',compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=> 'required',
            'category_id'=> 'required',
            'brand_id'=> 'required',
            'desc'=> 'required',
            'content'=> 'required',
            'price'=> 'required',
            'status'=> 'required'
        ]);
        $data['image'] = Helper::imageUpload($request);
        if(Product::create( $data))
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route($this->index);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands=Brand::all();
        return view($this->viewprefix.'edit',compact('product', 'categories','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data=$request->validate([
            'name'=> 'required',
            'category_id'=> 'required',
            'brand_id'=> 'required',
            'desc'=> 'required',
            'content'=> 'required',
            'price'=> 'required',
            'status'=> 'required'
        ]);
        $data['image'] = Helper::imageUpload($request);
        if($product->update($data))
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route($this->index);
    }
    public  function active(Request $request,Product $product)
    {
        if($request->changeStatus==0)
        {
            $product->status = $request->changeStatus;
        }
        if($request->changeStatus==1)
        {
            $product->status = $request->changeStatus;
        }
        $product->save();
        return redirect()->back()->with('message', 'Thay đổi Trạng Thái Thành Công !');
    }
    public function detail($id)
    {
        $product = Product::find($id);
        return view('admin.product.detail', compact('product'));
    }
}
