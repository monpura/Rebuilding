<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Category;
// Direct DB call
use DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$product_categories = Category::all();
        $product_categories = Category::orderBy('created_at', 'desc')->paginate(10);
        return view('categories.index')->with('product_categories', $product_categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'category_name' => 'required',
        ]);

        $product_category = new Category;
        $product_category->category_name = $request->input('category_name');
        if($request->input('published') == 0)
        {
            $product_category->published = 0;
        }
        else
        {
            $product_category->published = $request->input('published');
        }
        $product_category->deleted = 0;
        $product_category->save();

        return redirect('/categories')->with('sucess', 'Product Category Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_category = Category::find($id);

        return view('categories.edit')->with('product_category', $product_category);
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
        // From validation
        $this->validate($request, [
            'category_name' => 'required',
        ]);
        

        // Update Product Category
        $product_category = Category::find($id);
        $product_category->category_name = $request->input('category_name');
        if($request->input('published') == 0)
        {
            $product_category->published = 0;
        }
        else
        {
            $product_category->published = $request->input('published');
        }
        
        $product_category->save();

        return redirect('/categories')->with('sucess', 'Product Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete product
        $product_category = Category::find($id);

        // Check for correct user
       /** if(auth()->user()->id !== $product->user_id){
            return redirect('/products')->with('error', 'Unauthorized Page');
        }**/
        
        $product_category->delete();

        return redirect('/categories')->with('success', 'Product Category Removed');
    }
}
