<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function store(ProductStoreRequest $productStoreRequest)
    {
      $product =  Product::create($productStoreRequest->except('image'));
      $product_image_url = Storage::putFile('/product' , $productStoreRequest->image);
      $product->update(['image' => $product_image_url]);
      $productInfo = Product::find($product->id);
      return response()->json(
          [
              "message" => "Product created",
              "data" => new ProductResource($productInfo)
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
