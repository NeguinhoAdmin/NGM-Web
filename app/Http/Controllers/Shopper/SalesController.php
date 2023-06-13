<?php

namespace App\Http\Controllers\Shopper;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Motorcycle;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Filerental;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\Bloodline;
use system;

class SalesController extends Controller
{
    public function NewForSale()
    {
        $motorcycles = Category::findOrFail(77)->products()->paginate(9);
        $motorcycle_id = $motorcycles[0]->id;
        $brand_id = $motorcycles[0]->brand_id;

        $images = Media::all()
            ->where('model_type', 'product')
            ->where('model_id', $motorcycle_id);

        $brand = Brand::all()
            ->where('id', $brand_id);

        return view('frontend.motorcycles-new', [
            'motorcycles' => $motorcycles,
            'image' => $images,
            'brand' => $brand
        ]);
    }

    public function NewBikeDetails($id)
    {
        $product = Product::findOrFail($id);

        $image = Media::all()
            ->where('model_type', 'product')
            ->where('model_id', $id);

        $brand_image = Media::all()
            ->where('model_type', 'brand')
            ->where('model_id', $product['brand']->id);

        return view('frontend.motorcycle-new', [
            'product' => $product,
            'image' => $image,
            'brand_image' => $brand_image
        ]);
    }

    public function UsedForSale()
    {
        $motorcycles = Category::findOrFail(80)->products()->paginate(9);
        $motorcycle_id = $motorcycles[0]->id;
        $brand_id = $motorcycles[0]->brand_id;

        $images = Media::all()
            ->where('model_type', 'product')
            ->where('model_id', $motorcycle_id);

        $brand = Brand::all()
            ->where('id', $brand_id);

        return view('frontend.motorcycles-used', [
            'motorcycles' => $motorcycles,
            'image' => $images,
            'brand' => $brand
        ]);
    }

    public function UsedBikeDetails($id)
    {
        $motorcycle = Product::findOrFail($id);

        $image = Media::all()
            ->where('model_type', 'product')
            ->where('model_id', $id);

        $brand_image = Media::all()
            ->where('model_type', 'brand')
            ->where('model_id', $motorcycle['brand']->id);

        return view('frontend.motorcycle-used', [
            'motorcycle' => $motorcycle,
            'image' => $image,
            'brand_image' => $brand_image
        ]);
    }

    public function RentBike()
    {
        $motorcycles = Motorcycle::all()
            ->where('availability', '=', 'for rent');

        $count = $motorcycles->count();

        return view('frontend.motorcycle-rentals', compact('motorcycles'));

        // $motorcycles = Category::findOrFail(78)->products()->paginate(9);
        // $motorcycle_id = $motorcycles[0]->id;
        // $brand_id = $motorcycles[0]->brand_id;

        // $images = Media::all()
        //     ->where('model_type', 'product')
        //     ->where('model_id', $motorcycle_id);

        // $brand = Brand::all()
        //     ->where('id', $brand_id);

        // return view('frontend.motorcycle-rentals', [
        //     'motorcycles' => $motorcycles,
        //     'image' => $images,
        //     'brand' => $brand
        // ]);
    }

    public function RentalDetails($id)
    {
        $motorcycle = Product::findOrFail($id);
        dd($motorcycle);
        $image = Filerental::all()->where('registration', $motorcycle->registration);

        return view('frontend.motorcycle-rental', compact('motorcycle'));
        // $image = Media::all()
        //     ->where('model_type', 'product')
        //     ->where('model_id', $id);
        // dd($image);

        // $brand_image = Media::all()
        //     ->where('model_type', 'brand')
        //     ->where('model_id', $motorcycle['brand']->id);

        // return view('frontend.motorcycle-rental', [
        //     'motorcycle' => $motorcycle,
        //     'image' => $image,
        //     'brand_image' => $brand_image
        // ]);
    }
}
