<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($request->quantity < 1) {
          return redirect()->back()->with('success', 'Quantité inférieure à 1');
        }

        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request) {
        	return $cartItem->id == $request->product_id;
        });

        // dd($duplicata);
        if ($duplicata->isNotEmpty()) {

          return redirect()->route('products.index')->with('error', 'Oups!! Le produit a déjà été ajouté au panier');
        }

        $product = Product::find($request->product_id);

        Cart::add($product->id, $product->title, $request->quantity, $product->price)
            ->associate('App\Product');

        return redirect()->route('products.index')->with('success', 'Produit ajouté au panier');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if ($request->quantity < 1) {
        return redirect()->back()->with('success', 'Quantité inférieure à 1');
      }

      return redirect()->route('products.index')->with('success', 'Panier mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
      // $rowId = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';

      Cart::remove($rowId);

      return back()->with('success' , 'Le produit a été supprimé.');
    }


}
