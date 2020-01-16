@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    @foreach(Session::get('success') as $message)
                        {!! $message !!}
                    @endforeach
                </div>
            @endif

            <div class="card">
                <div class="card-header"><strong>Dashboard | Products</strong>
                    <span class="float-right">
                        <a href="{{ route('product.create') }}" class="btn btn-sm btn-info">Create</a>
                    </span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col" width="10%">Price</th>
                                <th scope="col" width="10%">Edit</th>
                                <th scope="col" width="10%">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($products as $product)
                            <tr>
                                <td scope="row">{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>R{{ number_format((float)$product->price, 2, '.', '') }}</td>
                                <td width="1%"><a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
                                <td width="1%">
                                    <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td scope="row" colspan="5">No products created yet.</td>
                            </tr>
                            @endforelse

                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
