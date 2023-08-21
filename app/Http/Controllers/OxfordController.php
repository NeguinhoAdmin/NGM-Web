<?php

namespace App\Http\Controllers;

use View;
use App\Models\Oxford;
use Illuminate\Http\Request;
use App\Models\OxfordCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Collection;

class OxfordController extends Controller
{
    public function getProductCategory($category_id)
    {
        // $superProductNames = Oxford::distinct()->where('category_id', $category_id)->whereNotNull('super_product_name')->get(['super_product_name']);
        // $superProductName = json_decode($superProductNames);

        // dd($superProductName);

        $products = Oxford::select('id', 'ean', 'image_url', 'description', 'sku', 'price', 'colour', 'brand', 'category')
            ->where('category_id', $category_id)
            // ->where('super_product_name', 'like', $product)
            ->where('stock', '=>', 1)
            ->simplePaginate(24);

        $cat = Oxford::select('category')
            ->where('category_id', $category_id)
            ->first();

        $category = strtolower($cat->category);

        return view('frontend.products', compact('products', 'category', 'category_id'));
    }

    public function getOxfordProduct($id)
    {
        $item = Oxford::find($id);
        // dd($item);
        $product_id = $id;
        $category_id = $item->category_id;
        $category = strtolower($item->category);
        $cookie = strtolower($item->description);
        $title = $item->description;

        return view('frontend.product', [
            'item' => $item,
            'title' => $title,
            'category_id' => $category_id,
            'product_id' => $product_id,
            'category' => $category,
            'cookie' => $cookie,
        ]);
    }

    public function oxfordCart()
    {
        return view('frontend.cart');
    }

    public function addProductCart($id)
    {
        $product = Oxford::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "sku" => $product->sku,
                "name" => $product->description,
                "quantity" => $product->quantity,
                "price" => $product->price,
                "image" => $product->image_url
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product has been added to cart!');
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', 1);
            session()->flash('success', 'Product added to cart.');
        }
    }

    public function deleteProduct(Request $request)
    {
        dd($request);
        Cart::destroy();
        // if ($request->id) {
        //     $cart = session()->get('cart');
        //     if (isset($cart[$request->id])) {
        //         unset($cart[$request->id]);
        //         session()->put('cart', $cart);
        //     }
        //     session()->flash('success', 'Item removed from your shopping cart.');
        // }

        return redirect('/cart');
        // return to_route('/cart', [$request->id])
        //     ->with('success', 'Rental deposit updated.');
    }
}
