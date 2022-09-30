@extends('layouts.boutique')

@section('content')

<div class="row mb-2 mt-5">


    <div class="col-md-12">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-300 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <h4 class="mb-0"> {{ $product->title }} </h4>
          <div class="mb-1 text-muted">{{ $product->created_at->format('d/m/Y') }}</div>
          <p class="card-text mb-2">{{ $product->description }}</p>
          <p class="card-text mb-2"> <strong>{{ $product->getPrice() }}</strong> </p>

          <form class="" action="{{ route('cart.store') }}" method="post">
            @csrf

            <input type="hidden" name="product_id" value="{{ $product->id }}">
              <div class="form-group">
                  <label for="quantity" class="text-danger">Quantité</label>
                  <input type="number" id="quantity" name="quantity" value="1" class="form-control col-md-3" required>
              </div>
              <button type="submit" class="btn btn-info" name="button">
                  <i data-feather="shopping-cart" stroke-width="2" width="16" height="16"></i>
                  <span class="text-icon">Ajouter au panier</span>
              </button>
              @auth
            <a href="{{ route('products.edit', $product->slug) }}" class="btn btn-warning">
                <i data-feather="edit" stroke-width="2" width="16" height="16"></i>
                <span class="text-icon"> Modifier</span>
            </a>
                  <a href="" class="btn btn-danger">
                      <i data-feather="trash-2" stroke-width="2" width="16" height="16"></i>
                      <span class="text-icon"> Supprimer</span>
                  </a>
              @endauth
          </form>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="{{ asset('img/image.png') }}" alt="">
        </div>
      </div>
    </div>


</div>


@endsection
