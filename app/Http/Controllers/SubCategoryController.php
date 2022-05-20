<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::all();
        return response()->view('cms.sub-categories.index', ['subCategories' => $subCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return response()->view('cms.sub-categories.create', ['categories' => $categories]);
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
            'category_id' => 'required|numeric|exists:categories,id',
            'name' => 'required|string|min:3|max:35',
            'image' => 'required|image|mimes:jpg,png|max:2048',
            'active' => 'required|in:true,false',
        ]);

        if (!$validator->fails()) {
            $subCategory = new SubCategory();
            $subCategory->name = $request->get('name');
            $subCategory->category_id = $request->get('category_id');
            $subCategory->active = $request->get('active') == 'true';
            // if ($request->hasFile('image')) {
            //     $imageName = 'sub_categories/' . time() . '_' . str_replace(' ', '', $subCategory->name_en) . '.' . $request->file('image')->extension();
            //     $request->file('image')->storePubliclyAs('sub_categories', $imageName, ['disk' => 'public']);
            //     $subCategory->image = $imageName;
            // }
            // if ($request->hasFile('image')) {
            //     $file = $request->file('image');
            //     $imageName = Carbon::now() . '_subCategory_image.' . $file->getClientOriginalExtension();
            //     $request->file('image')->storePubliclyAs('images/subCategories', $imageName);
            //     $imagePath = 'images/subCategories/' . $imageName;
            //     $subCategory->image = $imagePath;
            // }
            if ($request->hasFile('image')) {
                Storage::disk('public')->delete('sub_categories/' . $subCategory->image);
                $imageName = 'sub_categories/' . time() . '_' . str_replace(' ', '', $subCategory->name_en) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('sub_categories', $imageName, ['disk' => 'public']);
                $subCategory->image = $imageName;
            }
            $isSaved = $subCategory->save();
            return response()->json(['message' => $isSaved ? 'Saved successfully' : 'Failed to save'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = Category::all();
        return response()->view('cms.sub-categories.edit', ['categories' => $categories, 'subCategory' => $subCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $validator = Validator($request->all(), [
            'category_id' => 'required|numeric|exists:categories,id',
            'name' => 'required|string|min:3|max:35',
            'image' => 'nullable|image|mimes:jpg,png|max:2048',
            'active' => 'required|in:true,false',
        ]);

        if (!$validator->fails()) {
            $subCategory->name = $request->get('name');
            $subCategory->category_id = $request->get('category_id');
            $subCategory->active = $request->get('active') == 'true';
            if ($request->hasFile('image')) {
                Storage::disk('public')->delete('sub_categories/' . $subCategory->image);
                $imageName = 'sub_categories/' . time() . '_' . str_replace(' ', '', $subCategory->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('sub_categories', $imageName, ['disk' => 'public']);
                $subCategory->image = $imageName;
            }
            $isSaved = $subCategory->save();
            return response()->json(['message' => $isSaved ? 'Saved successfully' : 'Failed to save'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $isDeleted = $subCategory->delete();
        return response()->json(['message' => 'Deleted successfully'], $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
