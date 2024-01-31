<?php

namespace App\Http\Controllers;

use App\Models\product_types;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Http\Requests\Storeproduct_typesRequest;
use App\Http\Requests\Updateproduct_typesRequest;

class ProductTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        //
        return view('product_types.index', [
            'product_types' => product_types::latest()->paginate(3)
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('product_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeproduct_typesRequest $request) : RedirectResponse
    {
        //
        product_types::create($request->all());
        return redirect()->route('product_types.index')->withSuccess('New product types is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(product_types $product_types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product_types $product_types)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateproduct_typesRequest $request, product_types $product_types)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product_types $product_types)
    {
        //
    }
}
