<?php

namespace App\Http\Controllers\Shopper;

use App\Models\Oxford;
use App\Models\Motorcycle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartCount = Cart::count();
        $cartItems = Cart::instance('default')->content();
        $cartTaxRate = config('cart.tax');
        $tax = config('cart.tax') / 100;
        $cartSubtotal = Cart::instance('default')->subtotal();
        $cartTax = $cartSubtotal * $tax;
        $newTotal = Cart::instance('default')->total();

        return view('frontend.cart', [
            'cartCount' => $cartCount,
            'cartItems' => $cartItems,
            'cartTaxRate' => $cartTaxRate,
            'tax' => $tax,
            'cartSubtotal' => $cartSubtotal,
            'cartTax' => $cartTax,
            'newTotal' => $newTotal,
        ]);
    }

    // Needs to be shown in users dashboard
    public function wishList()
    {
        return view('frontend.cart', [
            'cartItems' => Cart::instance('wishlist')->content(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($product_id)
    {
        $product = Oxford::select('id', 'sku', 'description', 'price', 'image_url', 'extended_description')
            ->where('id', $product_id)
            ->get();

        $quantity = 1;
        $totalQty = 1;
        $vat = 20;

        Cart::instance('default')->add($product_id, $product[0]->description, $quantity, $product[0]->price, 0, ['totalQty' => $totalQty, 'product_code' => $product[0]->sku, 'image' => $product[0]->image_url, 'details' => $product[0]->extended_description])->associate('App\Models\Oxford');

        /* Redirect to prevend re-adding on refreshing */
        return redirect()->route('product.cart')->withSuccess('Product has been successfully added to the Cart.');
    }

    public function store(Request $request, $id)
    {
        $item = Oxford::select('id', 'sku', 'description', 'price', 'image_url', 'extended_description', 'category_id')
            ->where('id', $id)
            ->get();

        $quantity = $request->quantity;

        foreach ($item as $product) {
            // Determine whether the product is taxed
            if ($product->category_id == 1) {
                // If helmets category then no tax
                Cart::instance('default')->add($product->sku, $product->description, $quantity, $product->price, 0, ['totalQty' => $quantity, 'product_code' => $product->sku, 'image' => $product->image_url, 'details' => $product->extended_description])->associate('App\Models\Oxford');
            } else {
                // All other categories require the addition of VAT
                $vat = 20;

                // Price excluding VAT
                $priceExVat = $product->price;

                // Calculate how much VAT to be added to the price
                $vatToPay = ($priceExVat / 100) * $vat;

                $productPrice = $priceExVat + $vatToPay;

                Cart::instance('default')->add($product->sku, $product->description, $quantity, $productPrice, 0, ['totalQty' => $quantity, 'product_code' => $product->sku, 'image' => $product->image_url, 'details' => $product->extended_description])->associate('App\Models\Oxford');
            }
        }
        // // Determine whether the product is taxed
        // if ($product->category_id == 1) {
        //     Cart::instance('default')->add($product[0]->sku, $product[0]->description, $quantity, $product[0]->price, 0, ['totalQty' => $quantity, 'product_code' => $product[0]->sku, 'image' => $product[0]->image_url, 'details' => $product[0]->extended_description])->associate('App\Models\Oxford');
        // } else {
        //     echo "This product is taxed";
        // }

        /* Redirect to prevend re-adding on refreshing */
        return redirect()->route('product.cart')->withSuccess('Product has been successfully added to the Cart.');
    }

    public function storeRental()
    {
        echo 'Store rental to cart';
    }

    public function checkout()
    {
        Cart::count();

        return view('frontend.checkout');
    }
    public function delete(Request $request)
    {
        // return redirect()->back();
    }
}
