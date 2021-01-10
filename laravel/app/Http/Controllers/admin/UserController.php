<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;
use App\Classes\Helper;
class UserController extends Controller
{
    public function __construct()
    {
        $this->view_prefix='admin.user.';
        $this->view_namespace='panel/user';
    }
    public function index()
    {
        $users = User::all();
        return view($this->view_prefix.'index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view_prefix.'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
        ]);
        // $request->image = $this->imageUpload($request);
        $user->name = $request->name;
       // $Category->image = $this->imageUpload($request);
        $user->image = Helper::imageUpload($request);
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->address='';
        $user->street='';
        $user->city='';
        $user->district='';
        if($user->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $category
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view($this->view_prefix.'edit')->with('user', $user);
        // return view($this->viewprefix.'edit',compact('product'));
    }
    public function update(Request $request, User $user)
    {     /*
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'content' => 'required',
        ]);
        */

        $data=$request->validate([
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
            'phone' => 'required'
        ]);
        $data['image'] = Helper::imageUpload($request);
        if($user->update($data))
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('user.index');
    }
    public function destroy(User $user)
    {
        if($user->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('user.index');
    }
}
