@extends('products.layouts')
{{-- @section('title','Product') --}}
@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Show Products
                </div>
                <div class="float-end">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr;Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Product
                            Name:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;"> {{ $products->name}}</div>
                </div>
                <div class="row">
                    <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Product Cost:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;"> {{ $products->cost}}</div>
                </div>
                <div class="row">
                    <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Product
                            Price:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;"> {{ $products->price}}</div>
                </div>
                <div class="row">
                    <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Product
                            Quantity:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;"> {{ $products->quantity}}</div>
                </div>
                <div class="row">
                    <label for="text" class="col-md-4 col-form-label text-md-end text-start"><strong>Product
                            Type:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;"> {{ $product_types->product_types_name}}</div>
                </div>
                <div class="row mt-4">
                    <label for="text" class="col-md-4 col-form-label text-md-end text-start"><strong>Product
                            Image:</strong></label>
                            <div class="col-md-6" style="line-height: 35px;"> <img src="{{URL::asset('/images/').'/'.$products->image}}" alt="100" height="200" width="200"></div>
                            
                </div>
               
                
            </div>
        </div>
    </div>
</div>

@endsection