@extends('product_types.layouts')
@section('title','Edit')
@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Product Types
                </div>
                <div class="float-end">
                    <a href="{{ route('product_types.index') }}" class="btn btn-primary btn-sm">&larr;Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('product_types.update',$product_type->id)}}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Product Type Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('product_types_name') is-invalid @enderror" id="product_types_name" name="product_types_name" value="{{$product_type->product_types_name}}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Product Types">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection