@extends('products.layouts')
@section('title','Product')
@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Product
                </div>
                <div class="float-end">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr;Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Product Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $product->name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row mb-3">
                        <label for="cost" class="col-md-4 col-form-label text-md-end text-start">Product Cost</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('cost') is-invalid @enderror" id="cost" name="cost" value="{{ $product->cost }}">
                            @if ($errors->has('cost'))
                                <span class="text-danger">{{ $errors->first('cost') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row mb-3">
                        <label for="price" class="col-md-4 col-form-label text-md-end text-start">Product Price</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $product->price }}">
                            @if ($errors->has('price'))
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row mb-3">
                        <label for="quantity" class="col-md-4 col-form-label text-md-end text-start">Product Quantity</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ $product->quantity }}">
                            @if ($errors->has('quantity'))
                                <span class="text-danger">{{ $errors->first('quantity') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row mb-3">
                        <label for="product_types_id" class="col-md-4 col-form-label text-md-end text-start">Product Types</label>
                        <div class="col-md-6">
                            <select class="form-select" aria-label="Default select example" id="product_types_id" name="product_types_id">
                                @foreach ($product_type as $item)
                                    <option value="{{$item->id}}" id="product_types_id" name="product_types_id">{{$item->product_types_name}}</option>
                                @endforeach
                              </select>
                        </div>
                    </div>
                    <div class="mb-3 row mb-3">
                        <label for="file" class="col-md-4 col-form-label text-md-end text-start">Product Image</label>
                        <div class="col-md-6">
                          <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" ">
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        <input type="hidden" value="{{$product->image}}" name="b_image">
                        <input type="hidden" value="{{$product->id}}" name="id>


                        </div>
                    </div>
                    

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Product">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection