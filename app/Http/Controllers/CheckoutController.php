<?php

namespace App\Http\Controllers;
use Stripe\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Cart::count() <= 0) {
          return redirect()->route('products.index');
        }

        Stripe::setApiKey('sk_test_51H2S30HzZo5HBa1VIauKo12nixhV40BGpKTIdLorOHTvNIb6cecCfq1cNLyLapY9J7FSd8URLs1oQ56V85h22cjs00AIXoxfoa');

        $intent = PaymentIntent::create([
          'amount' => round(Cart::total()),
          'currency' => 'eur',
        ]);

        // dd($intent);
        $clientSecret = Arr::get($intent, 'client_secret');

        return view('checkout.index', [
          'clientSecret' => $clientSecret
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
