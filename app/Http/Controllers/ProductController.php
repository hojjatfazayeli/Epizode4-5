<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
      $product =  Product::create($request->all());

      return response()->json(
          [
              "message" => "Product created",
              "data" => $product
          ],200
      );
    }

    public function show(Product $product)
    {
        return response()->json([
            "message" => "اطلاعات محصول باموفقیت دریافت شد",
            "data" => $product
        ],200);
    }

    public function update(Product $product , Request $request)
    {
        $product->update(request()->all());
        $product  = Product::find($product->id);
        return response()->json([
            "message" => "اطلاعات محصول موردنظر با موفقیت بروزرسانی شد",
            "data" => $product
        ],200);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            "message" => "محصول با موفقیت حذف گردید",
        ],200);
    }
}
