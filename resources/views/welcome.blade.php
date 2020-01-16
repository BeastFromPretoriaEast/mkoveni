@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Products</div>

                    <div class="card-body">

                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                    <tr>
                                        <td scope="row">{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>R{{ number_format((float)$product->price, 2, '.', '') }}</td>
                                        <td width="1%">
                                            <button type="button" class="btn btn-info btn-sm modalClick" data-product="{{ $product->name }}" data-price="{{ number_format((float)$product->price, 2, '.', '') }}">
                                                Buy
                                            </button>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you would like to buy the <span class="text-info">"<span id="productName">Product name</span>"</span> for the amount of <span class="text-info">"R<span id="productPrice"></span>"</span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Buy Product</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(".modalClick").click(function(){
            let product = $(this).attr('data-product');
            let price = $(this).attr('data-price');

            $("#productName").text(product);
            $("#productPrice").text(price);

            $('#exampleModal').modal('show');
        });
    </script>

@endsection
