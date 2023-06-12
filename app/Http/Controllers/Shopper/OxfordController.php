<?php

namespace App\Http\Controllers\Shopper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Oxford;
use App\Models\OxfordCategory;
use Illuminate\Database\Eloquent\Collection;
use View;

class OxfordController extends Controller
{
    public function getProductCategory($category_id)
    {
        $products = Oxford::select('id', 'ean', 'image_url', 'description', 'sku', 'price', 'colour', 'brand', 'category')
            ->where('category_id', $category_id)
            ->where('stock', '=>', 1)
            ->paginate(24);

        $cat = Oxford::select('category')
            ->where('category_id', $category_id)
            ->first();

        $category = strtolower($cat->category);

        return view('frontend.products', compact('products', 'category', 'category_id'));
    }

    public function getOxfordProduct($id)
    {
        $data = Oxford::find($id);

        // $product_id = $id;
        // $category_id = $product->category_id;
        // $category = strtolower($product->category);
        // $cookie = strtolower($product->description);
        // $title = $product->description;

        return view('frontend.product', ['item' => $data]);
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
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed from your shopping cart.');
        }
    }
}
