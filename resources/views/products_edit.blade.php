@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Dashboard | Edit a Product</strong>
                    <span class="float-right">
                        {{--<a href="{{ route('product.create') }}" class="btn btn-sm btn-info">Create</a>--}}
                    </span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form method="POST" action="{{ route('product.update', $product->id) }}">
                            @method('patch')
                            @csrf

                            <div class="form-group row">
                                <div class="col-sm-6">
                                <label for="email">Name</label>
                                    <input id="name" placeholder="Product Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-6">
                                    <label for="email">Price</label>
                                    <input id="price" placeholder="Product Price"  type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" required autofocus>

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="email">Description</label>
                                    <input id="description" placeholder="Product Description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $product->description }}" required autofocus>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 text-right">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>

                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
