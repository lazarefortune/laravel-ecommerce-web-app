<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    private function createSlug(string $string): string
    {
        $string = strip_tags($string);
        $string = preg_replace('~[^\pL\d]+~u', '-', $string);
        setlocale(LC_ALL, 'en_US.utf8');
        $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
        $string = preg_replace('~[^-\w]+~', '', $string);
        $string = trim($string, '-');
        $string = preg_replace('~-+~', '-', $string);
        $string = strtolower($string);
        if (empty($string)) {
            return 'n-a';
        }
        return $string;
    }

    private function getDBProductPrice($price): float
    {
        return (float)str_replace(',', '.', $price) * 100;
    }

    private function getViewProductPrice($price): string
    {
        return number_format($price / 100, 2, ',', ' ');
    }

    private function validateProduct($requestData): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($requestData, [
            'title' => ['required', 'string', 'max:40'],
            'subtitle' => ['required', 'string'],
            'description' => ['required', 'string', 'min:10'],
            'price' => ['required'],
        ]);
    }


    public function index()
    {
        $products = Product::inRandomOrder()->take(6)->get();
//        $products = Product::all();
        return view('products.index')->with('products', $products);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = $this->validateProduct($request->all());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        Product::create([
            'title' => $request->title,
            'slug' => $this->createSlug($request->title),
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'price' => $this->getDBProductPrice($request->price),
            'image' => "https://via.placeholder.com/200x250",
        ]);

        return redirect()->route('products.index')->with('success', 'Produit ajouté avec succès');
    }

    public function show($productId)
    {
        $product = Product::where('id', $productId)->firstOrFail();

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Produit introuvable');
        }

        return view('products.show')->with('product', $product);
    }

    public function edit($productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            abort(404);
        }

        $product->price = $this->getViewProductPrice($product->price);

        return view('products.edit')->with('product', $product);
    }

    public function update(Request $request, $productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            abort(404);
        }

        $validator = $this->validateProduct($request->all());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $product->title = $request->title;
        $product->slug = $this->createSlug($request->title);
        $product->subtitle = $request->subtitle;
        $product->description = $request->description;
        $product->price = $this->getDBProductPrice($request->price);
        $product->image = "https://via.placeholder.com/200x250";
        $product->save();

        return redirect()->route('products.show', $productId)->with('success', 'Produit modifié avec succès');
    }

}
