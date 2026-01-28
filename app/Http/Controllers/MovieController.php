<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $day = $request->get('day');

//        $movies = Movie::with('genres')->get();

//        dd($day);

            $sessions = Session::whereDate('date', $day)
                ->with('movie')
                ->orderBy('time')
                ->get()
                ->groupBy('movie_id');

        if($day != null){
            $movies = Movie::whereIn('id', $sessions->keys())->with('genres')->get();
        }else {
            $movies = Movie::with('genres')->get();
        }


        return view('home', compact('movies', 'sessions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ]);

        $input = $request->all();

        if($image = $request->file('image')){
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Movie::create($input);

        return redirect()->route('movies.index')
            ->with('success', 'Product created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $movie = Movie::with('genres', 'sessions')->find($id);
        return response()->json($movie);
    }
}
