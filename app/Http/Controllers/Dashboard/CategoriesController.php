<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Gate::denies('categories.view')) {
            abort(403);
        }

        $request = request();

        // $query = Category::query();
        // if ($name = $request->query('name'))
        // {
        //     $query->where('name', 'LIKE', "%{$name}%");
        // }
        // if ($status = $request->query('status'))
        // {
        //     $query->whereStatus($status);
        // }
        // $categories = $query->paginate(4);


// SELECT a.*, b.name as parent_name
// FROM categories as a
// LEFT JOIN categories as b ON b.id == a.parent_id

// $categories = Category::leftJoin('categories as parents', 'parents.id', '=', 'categories.parent_id')
//             ->select([
//                 'categories.*',
//                 'parents.name as parent_name'
//             ])
//             ->filter($request->query())
//             ->orderBy('categories.name')
//             ->paginate();

// Can make it using relations
$categories = Category::with('parent')
            // ->select('categories.*')
            // ->selectRaw('(SELECT COUNT(*) FROM products WHERE category_id = categories.id AND status = "active") as products_number')
            // ->addSelect(DB::row('(SELECT COUNT(*) FROM products WHERE category_id = categories.id) as products_count'))

            // products --> relation name // return property relation_count by Default //products_count
            // ->withCount('products as products_number')

            // to add condition where --> use cloasure function
            ->withCount([
                'products as products_number' => function ($query) {
                    $query->where('status', '=', 'active');
                }
            ])
            ->filter($request->query())
            ->orderBy('name')
            ->paginate();

        // Using local scope // scopeFilter() in Category model
        // $categories = Category::filter($request->query())->orderBy('name')->paginate(4);
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('categories.create')) {
            abort (403);
        }

        $parents = Category::all();
        $category = new Category();
        return view('dashboard.categories.create', compact('parents', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {

        Gate::authorize('categories.create');
        // validation in CategoryRequset
        // $request->validate(Category::rules());

        //Reqest merge
        $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);

        $data =  $request->except('image');

        $data['image'] = $this->uploadImage($request);

        // Mass assignment
        Category::create($data);

        //PRG (POST REDIRET GET)
        return Redirect::route('dashboard.categories.index')->with([
            'message' => 'Category Created.',
            'type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        if (Gate::define('category.view')) {
            abort(403);
        }
        return view('dashboard.categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        Gate::authorize('categories.update');

        try {
            $category = Category::findOrFail($id);
        } catch (Exception $e) {
            return redirect()->route('dashboard.categories.index')->with([
                'message' => 'Record not found!',
                'type' => 'info'
            ]);
        }
        // SELECT * FROM categories WHERE id <> $id
            // AND (parent_id IS NULL OR parent_id <> $id)
        $parents = Category::where('id', '<>', $id)
            ->where(function ($query) use ($id) {
                $query->whereNull('parent_id')
                    ->orWhere('parent_id', '<>', $id);
            })->get();
        return view('dashboard.categories.edit', compact('category', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        // Gate::authorize('category.update'); // I make authorize in CategoryReqest

        $category = Category::findOrFail($id);

        $old_image = $category->image;

        $data =  $request->except('image');

        $new_image = $this->uploadImage($request);
        if ($new_image) {
            $data['name'] = $new_image;
        }

        $category->update($data);

        if ($old_image && $new_image) {
            Storage::disk('public')->delete($old_image);
        }

        return redirect()->route('dashboard.categories.index')->with([
            'message' => 'Updated Successfully',
            'type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Gate::authorize('categories.dalete');

        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with([
            'message' => 'Deleted Successfully',
            'type' => 'success'
        ]);
    }

    protected function uploadImage(Request $request) {
        if (!$request->hasFile('image')) return;
        $file = $request->file('image');
        $path = $file->storeAs('uploads', rand().'_'.time().'_'.$file->getClientOriginalName(), [
            'disk' => 'public'
        ]);
        return $path;
    }

    public function trash ()
    {
        $categories = Category::onlyTrashed()->filter(request()->query())->paginate();
        return view('dashboard.categories.trash', compact('categories'));
    }

    public function restore (Request $request, $id) {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();
        return redirect()->route('dashboard.categories.trash')->with([
            'message' => 'Record Successfully Retrieved!',
            'type' => 'success'
        ]);
    }

    public function forceDelete($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();

        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        return redirect()->route('dashboard.categories.trash')->with([
            'message' => 'Record Permanently Deleted!',
            'type' => 'error'
        ]);
    }
}
