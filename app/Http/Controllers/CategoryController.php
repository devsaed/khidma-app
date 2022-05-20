<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::withCount('subCategories')->get();
        return response()->view('cms.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|max:35',
            'image' => 'nullable|image|mimes:jpg,png|max:2048',
            'active' => 'required|in:true,false',
        ]);

        if (!$validator->fails()) {
            $category = new Category();
            $category->name = $request->get('name');
            $category->active = $request->get('active') == 'true';
            if ($request->hasFile('image')) {
                $imageName = 'categories/' . time() . '_' . str_replace(' ', '', $category->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('categories', $imageName, ['disk' => 'public']);
                $category->image = $imageName;
            }
            $isSaved = $category->save();
            return response()->json(['message' => $isSaved ? 'Saved successfully' : 'Failed to save'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $subCategories = $category->subCategories;
        return response()->view('cms.sub-categories.index', ['subCategories' => $subCategories]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return response()->view('cms.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|max:35',
            'image' => 'required|image|mimes:jpg,png|max:2048',
            'active' => 'required|in:true,false',
        ]);

        if (!$validator->fails()) {
            $category->name = $request->get('name');
            $category->active = $request->get('active') == 'true';
            if ($request->hasFile('image')) {
                $imageName = 'categories/' . time() . '_' . str_replace(' ', '', $category->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('categories', $imageName, ['disk' => 'public']);
                $category->image = $imageName;
            }
            $isSaved = $category->save();
            return response()->json(['message' => $isSaved ? 'Saved successfully' : 'Failed to save'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        
            $isDeleted = $category->delete();
            return response()->json(['message' => 'Deleted successfully'], $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
