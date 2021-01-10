<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use Session;
use App\Classes\Helper;
class CustomerController extends Controller
{
    public function __construct()
    {
        $this->view_prefix='admin.customer.';
        $this->view_namespace='panel/customer';
    }
    public function index()
    {
        $customers = User::all();
        return view($this->view_prefix.'index', compact('customers'));
    }
    public function destroy(User $customer)
    {
        if($customer->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('customer.index');
    }
}
