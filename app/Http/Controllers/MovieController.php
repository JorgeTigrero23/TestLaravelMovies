<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Validator;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::get();

        return response()->json($movies, 200);
    }

    public function save(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'name' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'year' => 'required',
            'duration' => 'required',
        ]);

        if($validator->fails()){
            return response()->json("Ocurrio Un error de validacion", 422);
        }

        $movie = Movie::create($input);

        return response()->json($movie, 200);
    }

    public function updated(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'name' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'year' => 'required',
            'duration' => 'required',
        ]);

        if($validator->fails()){
            return response()->json("Ocurrio Un error de validacion", 422);
        }

        $movie = Movie::find($id);
        
        $movie->name = $input['name'];
        $movie->description = $input['description'];
        $movie->genre = $input['genre'];
        $movie->year = $input['year'];
        $movie->duration = $input['duration'];
        $movie->save();

        return response()->json($movie, 200);
    }

    public function delete($id)
    {
        $movie = Movie::find($id);

        if($movie)
        {
            $movie->delete();
        }
       

        return response()->json($movie, 200);
    }
}
