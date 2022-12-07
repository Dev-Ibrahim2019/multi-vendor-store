<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Product::withoutGlobalScope('store')->paginate();

        // $products = DB::table('products')
        //     ->join('categories', 'categories.id', '=', 'products.category_id')
        //     ->join('stores', 'stores.id', '=', 'products.store_id')
        //     ->select('products.*', 'categories.name as category_name', 'stores.name as store_name')
        //     ->paginate();

        $products = Product::with(['category', 'store'])->filter(request()->query())->paginate();
        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        $tags = implode($product->tags()->pluck('name')->toArray());
        return view('dashboard.products.create', compact('product', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);
        $data = $request->except(['image', 'tag']);
        $data['image'] = $this->uploadImage($request);
//        dd($data['image']);
        $product = Product::create($data);
        $tags = json_decode($request->post('tag'));
        $tag_ids = [];
        $saved_tags = Tag::all();
        foreach($tags as $item) {
            $slug = Str::slug($item->value);
            $tag = $saved_tags->where('slug', $slug)->first();
            if (!$tag) {
                $tag = Tag::create([
                    'name' => $item->value,
                    'slug' => $slug
                ]);
            }
            $tag_ids[] = $tag->id;
        }
        $product->tags()->sync($tag_ids);
        return redirect()->back()->with([
            'message' => 'Saved Successfully',
            'type' => 'success'
        ]);
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
        $product = Product::findOrFail($id);
        $tags = implode(',', $product->tags()->pluck('name')->toArray());
        return view('dashboard.products.edit', compact('product', 'tags'));
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
        $data = $request->except(['image', 'tag']);
        $data['image'] = $this->uploadImage($request);
        $product->update($data);
        $tags = json_decode($request->post('tag'));  // tags in input file return json as string--> make decode to be object ✔️🔖
        $tag_ids = [];

        $saved_tags = Tag::all(); // return collection

        foreach($tags as $item) { // item here as a tags it's object to check dd(tags) so it has "value" attribute ✔️⭐
            $slug = Str::slug($item->value); //->>
            // $tag = Tag::where('slug', $slug)->first(); // search query on each tag. // لازم اقلل جمل الاستعلام ^^ // performace!! 😢
            $tag = $saved_tags->where('slug', $slug)->first(); // -->
            // It is not a query statment لما استدعي الكوليكشن واعمل عليه وير هنا ما بتكون جملة استعلام.. وهاد ميزة لارافيل ^^ 👌❤️
            if (!$tag) {
                $tag = Tag::create([
                    'name' => $item->value,
                    'slug' => $slug
                ]);
            }
            $tag_ids[] = $tag->id;
        }
        $product->tags()->sync($tag_ids);
        return redirect()->route('dashboard.products.index')->with([
            'message' => 'Product Updated',
            'type' => 'success'
        ]);
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
        return redirect()->back()->with(['message' => 'Deleted Successfully', 'type' => 'error']);
    }

    public function uploadImage(Request $request)
    {
        if (!$request->file('image')) return;
        $file = $request->file('image');
        $path = $file->storeAs('uploads', rand().'_'.time().'_'.$file->getClientOriginalName(), ['disk' => 'public']);
        return $path;
    }
}