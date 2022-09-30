@extends('layouts.boutique')

@section('content')

<div class="row mb-2 mt-5">

    @foreach($products as $product)
        <div class="col-md-6 ">
            <div
                class="row no-gutters border rounded shadow overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <!-- <strong class="d-inline-block mb-2 text-primary">World</strong> -->
                    <h6 class="mb-0 text-primary"> {{ $product->title }} </h6>
                    <div class="mb-1 text-muted">{{ $product->created_at->format('d/m/Y') }}</div>
                    <p class="card-text mb-auto">{{ $product->subtitle }}</p>
                    <p class="card-text mb-auto">
              <span class="product__price font-weight-bold">
                  <span class="h4"> {{ $product->getPrice() }}</span>
              </span>
                    </p>
                    <a href="{{ route('products.show', $product->slug) }}" class="stretched-link btn btn-primary">Consulter
                        le produit</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img src="{{ asset('img/image.png') }}" alt="">
                </div>
            </div>
        </div>
    @endforeach

</div>


@endsection
