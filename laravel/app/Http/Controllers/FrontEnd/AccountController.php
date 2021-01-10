<?php


namespace App\Http\Controllers\FrontEnd;


use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController
{
    public  function index()
    {
        $user = Auth::user();
        if(isset($user))
        {
            $orders = Order::all();
            $user=DB::table('users')->where('id',$user->name);
            return view('frontend.account.index',compact('orders'));
        }

    }
    public function create(Request $request)
    {
        $user = new User();
        // $request->image = $this->imageUpload($request);
        $user->name = '';
        // $Category->image = $this->imageUpload($request);
        $user->image = '';
        $user->email = $request->email;
        $user->password =Hash::make($request->password);
        $user->phone = '';
        $user->address='';
        $user->street='';
        $user->city='';
        $user->district='';
        $user->status=1;
        $user->save();
        return redirect()->route('login')->with('message', 'Đăng Ký Thành Công Vui Lòng Đăng Nhập');
    }
    public  function  update_information(Request $request)
    {
        $user = Auth::user();
        DB::table('users')->where('id',$user->id)->update(['name' => $request->name,
            'address'=>$request->address,'district'=>$request->district,'city'=>$request->city,'phone'=>$request->phone]);
        return redirect()->back()->with('message', 'Status changed!');
    }
    public  function changepass(Request $request)
    {
        $data=$request->validate([
            'old_password'     => 'required',
            'new_password'     => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);
        if(!\Hash::check($data['old_password'], auth()->user()->password)){

            return back()->with('error','Nhập Sai Mật Khẩu Hiện Tại');

        }else{
            auth()->user()->update([
                'password' => Hash::make($request->new_password),
            ]);
            return redirect()->back()->with("success","Đổi Mật Khẩu Thành Công!");
        }
    }
}
