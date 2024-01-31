@extends('product_types.layouts')
@section('title','Product Types')
@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Product Types List</div>
            <div class="card-body">
                <a href="{{route('product_types.create')}}" class="btn btn-success btn-smmy-2"><i class="bi bi-plus-circle"></i> Add New Product Types</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse ($product_types as $product_type)
                    <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$product_type->product_types_name}}</td>
                            <td>
                                <form action="#" method="post">
                                    <a href="#" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="#" class="btn btn-warning  btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="#"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty

                            <td colspan="6">
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