@extends('layouts.boutique')

@section('content')

<div class="my-3">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card card-body">
        <h3 class="text-center">Editer le produit</h3>
        <form class="mt-3" action="{{ route('products.update', $product->slug) }}" method="post">
          @csrf
          @method('HEAD')

          <div class="form-group">
            <label for="title" class="font-weight-bold">Nom</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $product->title }}">
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="slug" class="font-weight-bold">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') ?? $product->slug }}">
            @error('slug')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="subtitle" class="font-weight-bold">Sous titre</label>
            <input type="text" name="subtitle" id="subtitle" class="form-control @error('subtitle') is-invalid @enderror" value="{{ old('subtitle') ?? $product->subtitle }}">
            @error('subtitle')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
            <div class="form-group">
                <label for="description" class="font-weight-bold">Description</label>
                <textarea name="description" id="description" rows="3"
                          class="form-control @error('description') is-invalid @enderror"
                          cols="80">{{ old('description') ?? $product->description }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            {{--          <div class="form-group">--}}
            {{--            <label for="price" class="font-weight-bold">Prix (€)</label>--}}
            {{--            <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') ?? $product->price }}">--}}
            {{--            @error('price')--}}
            {{--                <span class="invalid-feedback" role="alert">--}}
            {{--                    <strong>{{ $message }}</strong>--}}
            {{--                </span>--}}
            {{--            @enderror--}}
            {{--          </div>--}}

            <div class="form-group mb-4">
                <label for="price" class="font-weight-bold">Montant</label>
                <div class="input-group">
                    <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror"
                           value="{{ old('price') ?? $product->price }}">
                    <div class="input-group-append">
                        <span class="input-group-text">€</span>
                    </div>
                </div>
                @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-success" name="button">
                <i data-feather="save" stroke-width="2" width="16" height="16"></i>
                Enregistrer
            </button>
        </form>
      </div>

    </div>
  </div>
</div>

@endsection
