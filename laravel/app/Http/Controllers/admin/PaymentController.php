<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Session;
use App\Classes\Helper;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('CheckAdminLogin');
        $this->viewprefix='admin.payment.';
        $this->viewnamespace='panel/payment';
    }
    public function index()
    {
        $payments = Payment::all();
        return view($this->viewprefix.'index')->with('cate', $payments);
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
        $Payment = new Payment();
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required',
        ]);
        $Payment->name = $request->name;
        $Payment->status = $request->status;
        if($Payment->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('payment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $Payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $Payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $Payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return view($this->viewprefix.'edit')->with('payment', $payment);
        // return view($this->viewprefix.'edit',compact('product'));
    }
    public function update(Request $request, Payment $Payment)
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
            'status' => 'required',
        ]);
        if($Payment->update($data))
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('payment.index');
    }
    public function destroy(Payment $payment)
    {
        if($payment->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('payment.index');
    }
    // public function productlist($id){
    //     $products = Payment::find($id)->product;
    //     return view('admin.Payment.productlist', compact('products'));
    // }
}
