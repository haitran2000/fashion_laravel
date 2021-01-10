<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;
use App\Classes\Helper;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('CheckAdminLogin');
        $this->viewprefix='admin.brand.';
        $this->viewnamespace='panel/brand';
    }
    public function index()
    {
        $Brands = Brand::all();
        return view($this->viewprefix.'index')->with('cate', $Brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->viewprefix.'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Brand = new Brand();
        $this->validate($request, [
            'name' => 'required',
            'desc' => 'required',
            'status' => 'required',
        ]);
        $Brand->name = $request->name;
        $Brand->image = Helper::imageUpload($request);
        $Brand->desc = $request->desc;
        $Brand->status = $request->status;
        if($Brand->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $Brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view($this->viewprefix.'edit')->with('brand', $brand);
        // return view($this->viewprefix.'edit',compact('product'));
    }
    public function update(Request $request, Brand $brand)
    {     /*
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'content' => 'required',
        ]);
        */

        $data=$request->validate([
            'name' => 'required',
            'desc' => 'required',
            'status' => 'required',
        ]);
        $data['image'] = Helper::imageUpload($request);
        if($brand->update($data))
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('brand.index');
    }
    public function destroy(Brand $brand)
    {
        if($brand->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('brand.index');
    }
    // public function productlist($id){
    //     $products = Brand::find($id)->product;
    //     return view('admin.Brand.productlist', compact('products'));
    // }
}
