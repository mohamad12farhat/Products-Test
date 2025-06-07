<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

   
    public function index(Request $request)
    {
        $query = Product::query();


        if ($request->has('min_stock'))
         {
            $query->minStock($request->min_stock);
         }
        
         return new ProductCollection($query->paginate(3));

        
           
    }

    /**
     * Store a newly created resource in storage.
     */

     private function validateProduct(Request $request)
     {
           return  $validated = $request->validate(
            [
                'name' => 'required|min:3',
                'price' => 'required|numeric|min:0.1',
                'stock' => 'nullable|integer|min:0',
            ]);
     }

    public function store(Request $request)
    {
        
        $validated = $this->validateProduct($request);
        Product::create($validated);

        return response()->Json([
            'message' => 'Product added successfully....'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
         $validated= $this->validateProduct($request);

         $product->update($validated);

         return response()->Json([
            'message' => 'Product updated successfully....'
         ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->Json([
            'message' => 'Product deleted successfully....'
        ]);
    }
}
