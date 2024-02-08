@extends('products.layouts')
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
                    <div class="card-header">Product List</div>
                    <div class="card-body">
                        <a href="{{route('products.create')}}" class="btn btn-success btn-smmy-2 mb-3"><i class="bi bi-plus-circle"></i> Add New Product Types</a>
                        <table class="table table-striped table-bordered text text-center ">
                            <thead>
                                <tr>
                                    <th scope="col">S#</th>
                                    <th scope="col">ID Products</th>
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
                  
                                    @forelse ($products as $product)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->cost}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td><img src="{{URL::asset('/images/').'/'.$product->image}}" alt="100" height="100" width="100"></td>
                                            <td>{{$product->product_types_name}}</td>
                                            <td>
                                                <form action="{{route('products.destroy',$product->id)}}" method="POST">
                                                    <input type="hidden" value="{{$product->image}}" name="image" id="image">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{route('show',[$product->id,$product->product_types_id])}}" class="btn btn-primary "><i class="bi bi-eye"></i> Show</a>
                                                    <a class="btn btn-warning" href="{{route('products.edit',$product->id)}}"><i class="bi bi-pencil-square"></i> Edit</a>
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                            <td colspan="9">
                                                <span class="text-danger">
                                                    <strong>No Product Types Found!</strong>
                                                </span>
                                            </td>
                                    @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection
