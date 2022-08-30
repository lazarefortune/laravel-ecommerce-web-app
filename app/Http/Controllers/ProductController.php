<?php

namespace App\Http\Controllers;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index(){

      // $products = Product::inRandomOrder()->take(6)->get();
      $products = Product::all();

      return view('products.index')->with('products', $products);
    }

    public function create(){

      return view('products.create');
    }

    public function store(Request $request){

      $validator = Validator::make($request->all(), [
          'title' => ['required', 'string', 'max:40'],
          'slug' => ['required', 'string'],
          'subtitle' => ['required', 'string'],
          'description' => ['required', 'string'],
          'price' => ['required', 'numeric'],
      ]);

      if ($validator->fails()) {
        return back()
                    ->withErrors($validator)
                    ->withInput();
      }

      Product::create([
          'title' => $request->title,
          'slug' => $request->slug,
          'subtitle' => $request->subtitle,
          'description' => $request->description,
          'price' => $request->price,
          'image' => "https://via.placeholder.com/200x250",
      ]);

      return redirect()->route('products.index')->with('success', 'Produit ajouté avec succès');

    }

    public function show($slug)
    {
      $product = Product::where('slug', $slug)->firstOrFail();

      return view('products.show')->with('product', $product);
    }

    public function edit($slug)
    {
      $product = Product::where('slug', $slug)->firstOrFail();

      return view('products.edit')->with('product', $product);
    }

    public function update(Request $request, $slug)
    {

      $validator = Validator::make($request->all(), [
          'title' => ['required', 'string', 'max:40'],
          'slug' => ['required', 'string'],
          'subtitle' => ['required', 'string'],
          'description' => ['required', 'string'],
          'price' => ['required', 'numeric'],
      ]);

      if ($validator->fails()) {
        return back()
                    ->withErrors($validator)
                    ->withInput();
      }

      $product = Product::where('slug', $slug)->firstOrFail();

          $product->title = $request->title;
          $product->slug = $request->slug;
          $product->subtitle = $request->subtitle;
          $product->description = $request->description;
          $product->price = $request->price;
          // 'image' = "https://via.placeholder.com/200x250",
          $product->save();

        return redirect()->route('products.show', $product->slug)->with('success', 'Produit mis à jour avec succès');

    }
}
