<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::paginate(
            request('perPage'),
            request('columns'),
            request('pageName'),
            request('page')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|string|min:6|max:200',
            'description' => 'required|string|max:255',
            'type' => 'required|string',
            'reusable' => 'boolean',
            'is_virtual' => 'boolean',
            'command' => 'string',
            'value' => 'string',
            'cost' => 'integer',
            'currency' => 'string',
            'lifetime' => 'string',
        ]);

        return Product::create(request([
            'name',
            'reusable',
            'is_virtual',
            'type',
            'command',
            'value',
            'cost',
            'currency',
            'lifetime',
            'description',
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product)
    {
        $this->validate(request(), [
            'name' => 'string|min:6|max:200',
            'description' => 'string|max:255',
            'type' => 'string',
            'reusable' => 'boolean',
            'is_virtual' => 'boolean',
            'command' => 'string',
            'value' => 'string',
            'cost' => 'integer',
            'currency' => 'string',
            'lifetime' => 'string',
        ]);

        return tap($product)->update(request([
            'name',
            'reusable',
            'is_virtual',
            'type',
            'command',
            'value',
            'cost',
            'currency',
            'lifetime',
            'description',
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }
}
