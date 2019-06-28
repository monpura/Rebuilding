<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductList;

class ProductListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductList::all();

        return view('product_lists.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_lists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // From validation
        $this->validate($request, [
            'product_name' => 'required',
            'product_number' => 'required'
        ]);

        // Create Product
        $product = new ProductList;
        $product->category_id = $request->input('category_id');
        $product->product_name = $request->input('product_name');
        $product->product_number = $request->input('product_number');
        $product->party_id = $request->input('party_id');
        $product->barcode = $request->input('barcode');
        $product->sale_price = $request->input('sale_price');
        $product->print_quantity = $request->input('print_quantity');
        $product->published = $request->input('published');
        $product->save();

        return redirect('/product_lists')->with('sucess', 'Product Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = ProductList::find($id);

        return view('product_lists.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = ProductList::find($id);

        return view('product_lists.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
