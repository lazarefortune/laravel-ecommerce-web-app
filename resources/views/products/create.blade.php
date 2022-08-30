@extends('layouts.boutique')

@section('content')

<div class="my-3">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card card-body">
        <h3 class="text-center">Ajouter un produit</h3>
        <form class="mt-3" action="{{ route('products.store') }}" method="post">
          @csrf

          <div class="form-group">
            <label for="title" class="font-weight-bold">Nom de votre produit</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="slug" class="font-weight-bold">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}">
            @error('slug')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="subtitle" class="font-weight-bold">Sous titre</label>
            <input type="text" name="subtitle" id="subtitle" class="form-control @error('subtitle') is-invalid @enderror" value="{{ old('subtitle') }}">
            @error('subtitle')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="description" class="font-weight-bold">Description</label>
            <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror" cols="80">{{ old('description') }}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="price" class="font-weight-bold">Prix (Euro) * 100</label>
            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <button type="submit" class="btn btn-success" name="button">Ajouter le produit</button>
        </form>
      </div>

    </div>
  </div>
</div>

@endsection
