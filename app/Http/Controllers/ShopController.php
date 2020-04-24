<?php

namespace App\Http\Controllers;

use App\Category;
use App\PaymentPlatform;
use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        return view('products.index');
    }

    public function shopCategory($category){
        $products = Product::where('category_id',$category)->paginate(12);
        $categories = Category::all();
        return view('products.category',
            [
                'products' => $products,
                'selectedCategory' => $category,
                'categories' => $categories
            ]);
    }

    public function getCart()
    {
        $cart = session()->get('cart');
        if(!isset($cart))
        {
            return 0;
        }
        else{
            $suma = 0;
            foreach ($cart as $product){
                $suma += $product['quantity'];
            }
            return $suma;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',
            [
                'product' => $product
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function showCart()
    {
        return view('products.cart');
    }

    public function showCheckout()
    {
        $paymentPlatforms = PaymentPlatform::all();
        return view('products.checkout')->with(['paymentPlatforms' => $paymentPlatforms]);
    }

    public function addToCart(Request $request)
    {
        $id = $request->id;
        $quantity = $request->quantity;
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                $id => [
                    "name" => $product->product_name,
                    "description" => $product->description,
                    "quantity" => $quantity,
                    "price" => $product->price,
                ]
            ];
            session()->put('cart', $cart);
            return response()->json(
                session()->get('cart')
            , 200);
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return response()->json(
                session()->get('cart')
            , 200);
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->product_name,
            "quantity" => $quantity,
            "description" => $product->description,
            "price" => $product->price,
        ];
        session()->put('cart', $cart);
        return response()->json(
            session()->get('cart')
        , 200);
    }

    public function updateCart(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            return response()->json(
                session()->get('cart')
                , 200);
        }
    }

    public function removeFromCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect('cart/shop');
        }
    }
}
