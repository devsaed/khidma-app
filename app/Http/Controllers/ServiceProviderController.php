<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\ServiceProvider;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ServiceProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceProviders = ServiceProvider::all();
        if(auth('admin')->check()){
            return response()->view('cms.service_providers.index', ['serviceProviders' => $serviceProviders]);
        }else{
            return response()->view('cms.service_providers.user-index', ['serviceProviders' => $serviceProviders]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categories = Category::all();
        $cities = City::all();
        return response()->view('cms.service_providers.create', [
            'categories' => $categories,
            'cities' => $cities,
        ]);
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
            'name' => 'required|string|min:3',
            'email' => 'required|string|email',
            'mobile' => 'required|string|numeric|digits:10',
            'description' => 'required|string|min:3|max:250',
            'image' => 'required|image|mimes:jpg,png|max:2048',
            'active' => 'required|in:true,false',
            'city_id' => 'required|numeric|exists:cities,id',
            'category_id' => 'required|numeric|exists:categories,id',
        ]);

        if (!$validator->fails()) {
            $serviceProvider = new ServiceProvider();
            $serviceProvider->name = $request->get('name');
            $serviceProvider->email = $request->get('email');
            $serviceProvider->mobile = $request->get('mobile');
            $serviceProvider->description = $request->get('description');
            $serviceProvider->category_id = $request->get('category_id');
            $serviceProvider->city_id = $request->get('city_id');
            $serviceProvider->active = $request->get('active') == 'true';
            if ($request->hasFile('image')) {
                $imageName = 'service_providers/' . time() . '_' . str_replace(' ', '', $serviceProvider->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('service_providers', $imageName, ['disk' => 'public']);
                $serviceProvider->image = $imageName;
            }
            $isSaved = $serviceProvider->save();
            return response()->json(['message' => $isSaved ? 'Saved successfully' : 'Failed to save'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceProvider $serviceProvider)
    {

        $categories = Category::all();
        $cities = City::all();
        return response()->view('cms.service_providers.edit', [
            'serviceProvider' => $serviceProvider,
            'categories' => $categories,
            'cities' => $cities,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceProvider $serviceProvider)
    {

        
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|string|email',
            'mobile' => 'required|string|numeric|digits:10',
            'description' => 'required|string|min:3|max:250',
            'image' => 'required|image|mimes:jpg,png|max:2048',
            'active' => 'required|in:true,false',
            'city_id' => 'required|numeric|exists:cities,id',
            'category_id' => 'required|numeric|exists:categories,id',
        ]);

        if (!$validator->fails()) {
            $serviceProvider->name = $request->get('name');
            $serviceProvider->email = $request->get('email');
            $serviceProvider->mobile = $request->get('mobile');
            $serviceProvider->description = $request->get('description');
            $serviceProvider->category_id = $request->get('category_id');
            $serviceProvider->city_id = $request->get('city_id');
            $serviceProvider->active = $request->get('active') == 'true';
            if ($request->hasFile('image')) {
                Storage::disk('public')->delete('service_providers/' . $serviceProvider->image);
                $imageName = 'service_providers/' . time() . '_' . str_replace(' ', '', $serviceProvider->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('service_providers', $imageName, ['disk' => 'public']);
                $serviceProvider->image = $imageName;
            }
            $isSaved = $serviceProvider->save();
            return response()->json(['message' => $isSaved ? 'Saved successfully' : 'Failed to save'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceProvider $serviceProvider)
    {
        $isDeleted = $serviceProvider->delete();
        return response()->json(['message' =>  $isDeleted ? 'Deleted successfully' : 'Delete failed'], $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
