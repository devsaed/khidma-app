<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CityController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(City::class, 'city');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::withCount('users')->get();
        return response()->view('cms.cities.index', ['cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                //
                $validator = Validator($request->all(), 
                [
                    'name' => 'required|string|min:3|max:30',
                ],
                [
                    'name.required' => 'Enter city name'
                ]
            );
    
            if (!$validator->fails()) {
                $city = new City();
                $city->name = $request->get('name');
                $isSaved = $city->save();
                return response()->json(['message' => $isSaved ? 'Saved successfully' : 'Failed to save'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return response()->view('cms.cities.edit', ['city' => $city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
            //
            $validator = Validator($request->all(), [
                'name' => 'required|string|min:3|max:30',
            ]);
            if (!$validator->fails()) {
                $city->name = $request->get('name');
                $isSaved = $city->save();
                return response()->json(['message' => $isSaved ? 'Update successfully' : 'Failed to update'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
           //
           $isDeleted = $city->delete();
           return response()->json(['message' =>  $isDeleted ? 'Deleted successfully' : 'Delete failed'], $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
