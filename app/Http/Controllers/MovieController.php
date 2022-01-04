<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Resources\MovieResource;
use Illuminate\Http\Request;
use App\Http\Resources\MovieCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return new MovieCollection($movies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'director_id'=>'required',
            'genre_id'=>'required',
            'description'=>'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        
        $movie = Movie::create([
            'name'=>$request->name,
            'director_id'=>$request->director_id,
            'genre_id'=>$request->genre_id,
            'description'=>$request->description
        ]);
        return response()->json(['Movie is created!', new MovieResource($movie)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    //    $movie = Movie::find($movie_id);

    //    if(is_null($movie)){
    //        return response()->json('Data not found',404);
    //    }
    //    return response()->json($movie);
    
    $movie = Movie::find($id);
        return new MovieResource($movie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'director_id'=>'required',
            'genre_id'=>'required',
            'description'=>'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        
      
            $movie->name=$request->name;
            $movie->director_id=$request->director_id;
            $movie->genre_id=$request->genre_id;
            $movie->description=$request->description;

            $movie->save();
        
        return response()->json(['Movie updated!', new MovieResource($movie)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return response()->json('Movie deleted!');
   
    }
}
