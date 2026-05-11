<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Product List
    public function index()
    {
        $products = Product::latest()->get();

        return apiResponse(
            'success',
            'Product List',
            ProductResource::collection($products)
        );
    }//end method

    // Create Product
    public function store(Request $request)
    {
        $request->validate([
            'Img' => 'required',
            'ProductCode' => 'required',
            'ProductName' => 'required',
            'Qty' => 'required',
            'UnitPrice' => 'required',
            'TotalPrice' => 'required',
        ]);

        $customId = bin2hex(random_bytes(12));

        $product = Product::create([
            '_id' => $customId,
            'Img' => $request->Img,
            'ProductCode' => $request->ProductCode,
            'ProductName' => $request->ProductName,
            'Qty' => $request->Qty,
            'UnitPrice' => $request->UnitPrice,
            'TotalPrice' => $request->TotalPrice,
        ]);

        return apiResponse(
            'success',
            'Product Created Successfully',
            new ProductResource($product),
            200
        );
    }//end method

    // Single Product
    public function show(string $id)
    {
        $product = Product::where('_id', $id)->first();

        if (!$product) {
            return apiResponse(
                'failed',
                'Product Not Found',
                null,
                404
            );
        }

        return apiResponse(
            'success',
            'Single Product',
            new ProductResource($product)
        );
    }//end method

    // Update Product
    public function update(Request $request, string $id)
    {
        $product = Product::where('_id', $id)->first();

        if (!$product) {
            return apiResponse(
                'failed',
                'Product Not Found',
                null,
                404
            );
        }

        $request->validate([
            'Img' => 'required',
            'ProductCode' => 'required',
            'ProductName' => 'required',
            'Qty' => 'required',
            'UnitPrice' => 'required',
            'TotalPrice' => 'required',
        ]);


        $product->update([
            'Img' => $request->Img,
            'ProductCode' => $request->ProductCode,
            'ProductName' => $request->ProductName,
            'Qty' => $request->Qty,
            'UnitPrice' => $request->UnitPrice,
            'TotalPrice' => $request->TotalPrice,
        ]);

        return apiResponse(
            'success',
            'Product Updated Successfully',
            new ProductResource($product)
        );
    }//end method

    // Delete Product
    public function destroy(string $id)
    {
        $product = Product::where('_id', $id)->first();

        if (!$product) {
            return apiResponse(
                'failed',
                'Product Not Found',
                null,
                404
            );
        }

        $product->delete();

        return apiResponse(
            'success',
            'Product Deleted Successfully'
        );
    }//end method

}
