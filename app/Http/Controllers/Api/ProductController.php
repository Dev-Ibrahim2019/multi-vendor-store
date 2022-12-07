<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

// use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{

    public function __construct ()
    {
        $this->middleware('auth:sanctum')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product = Product::filter($request->query())
            ->with('category:id,name', 'store:id,name', 'tags:id,name')
            ->paginate();
        return ProductResource::collection($product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'String', 'max:255'],
            'description' => 'nullable|string|max:255',
            'category_id' => ['required', 'exists:categories,id'],
            'status' => ['in:active,inactive'],
            'price' => 'required|numeric|min:0',
            'compare_price' => ['nullable', 'numeric', 'gt:price']
        ]);

        $product = Product::create($request->all());
        return response()->json($product, 201, [
            "Location" => route('product.show', $product->id), // add to header
        ]); // 201 --> Response::HTTP_CREATED
        // return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);

        // return $product->with('category:id,name', 'store:id,name', 'tags:id,name')->first();
        return $product->load('category:id,name', 'store:id,name', 'tags:id,name');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['sometimes' ,'required', 'String', 'max:255'], // sometimes
            'description' => 'nullable|string|max:255',
            'category_id' => ['sometimes', 'required', 'exists:categories,id'],
            'status' => ['in:active,inactive'],
            'price' => 'sometimes|required|numeric|min:0',
            'compare_price' => ['nullable', 'numeric', 'gt:price']
        ]);
        $product->update($request->all());
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        // return Response::json(null, 204); // 204 --> Response::HTTP_NO_CONTENT

        // return Response::json([
        //     'message' => 'product deleted successfully',
        // ], 200);

        return [
            'message' => 'product deleted successfully!',
        ];
    }
}
