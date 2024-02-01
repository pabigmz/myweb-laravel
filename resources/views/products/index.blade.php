@extends('product_types.layouts')
@section('title')
    Products
@endsection
@section('content')

        <div class="row justify-content-center mt-3">
            <div class="col-md-12">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">Users List</div>
                    <div class="text text-center card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">S#</th>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Cost</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Product Types</th>
                                    <th scope="col">Acttion</th>
                                </tr>
                            </thead>
                            <tbody>
                  
                                    @foreach ($products as $product)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->cost}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>#</td>
                                            <td>{{$product->product_types_name}}</td>
                                            <td>
                                                <a class="btn btn-primary" href="#">Edit</a>
                                                <a class="btn btn-danger" href="#">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                

                                    
                            </tbody>
                        </table>
       


                    </div>
                </div>
            </div>
        </div>

@endsection
