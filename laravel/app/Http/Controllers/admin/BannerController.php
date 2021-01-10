<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;
use App\Classes\Helper;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('CheckAdminLogin');
        $this->viewprefix='admin.banner.';
        $this->viewnamespace='panel/banner';
    }
    public function index()
    {
        $banners = Banner::all();
        return view($this->viewprefix.'index')->with('cate', $banners);
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
        $data=$request->validate([
            'desc' => 'required',
            'type' => 'required',
            'content' => 'required',
            'status' => 'required',
        ]);
        $data['image'] = Helper::imageUpload($request);
        if($data->create($data))
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $Banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $Banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $Banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view($this->viewprefix.'edit')->with('banner', $banner);
        // return view($this->viewprefix.'edit',compact('product'));
    }
    public function update(Request $request, Banner $banner)
    {     /*
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'content' => 'required',
        ]);
        */

        $data=$request->validate([
            'desc' => 'required',
            'status' => 'required',
            'type' => 'required',
            'content' => 'required',
        ]);
        $data['image'] = Helper::imageUpload($request);
        if($banner->update($data))
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('banner.index');
    }
    public function destroy(Banner $Banner)
    {
        if($Banner->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('banner.index');
    }
}
