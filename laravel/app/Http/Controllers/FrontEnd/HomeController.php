<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $products = Product::all();
        $categories= Category::all();

        $brands = Brand::all();
        return view('frontend.home.index', compact('banners','products','categories','brands'));
    }
    public function cart()
    {
        return view('FrontEnd.cart.index');
    }
    public function addToCart($id)
    {
        $product = Product::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "product_id"=>$product->id,
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "image" => $product->image
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "product_id"=>$product->id,
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $carts = session()->get('cart');

            $carts[$request->id]['quantity'] = $request->quantity;

            session()->put('cart', $carts);
            $carts=session()->get('cart');
            $cartComponent=view('frontend.cart.cart_components',compact('carts'))->render();
            return response()->json(['cart_components'=>$cartComponent,'code'=>200],200);
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $carts = session()->get('cart');

            if(isset($carts[$request->id])) {

                unset($carts[$request->id]);

                session()->put('cart', $carts);
                $cartComponent=view(    'frontend.cart.cart_components',compact('carts'))->render();
                return response()->json(['cart_components'=>$cartComponent,'code'=>200],200);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

    public function clear(Request $request)
    {
        session()->forget('cart');
        session()->flash('success', 'Cart is clear');
    }
    public function shoplist()
    {
        $products = Product::all();
        $categories = Category::all();
        return View('frontend.shoplist.index',compact('products','categories'));
    }
    public function singleproduct($id)
    {
        $products = Product::find($id);
        return View('frontend.singleproduct.index',compact('products'));
    }
}
