<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();
        /* Cuando son muchos juegos
        $games = Game::paginate(20); */
        return view('games.index')->with('games', $games);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('games.create');
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
        $game = new game;
        $game-> name = $request->name;
        $game-> description = $request->description;
        $game-> user_id = $request->user_id;
        $game-> category_id = $request->category_id;
        $game-> slider = $request->slider;
        $game-> price = $request->price;
        if($game->save()){
            return redirect('games')->with('message', 'The game: ' . $game->name . ' was successfully added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return view('games.show')->with('game', $game);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        return view('games.edit')->with('game', $game);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $game->name = $request->name;
        $game->description = $request->description;
        $game->user_id = $request->user_id;
        $game->category_id = $request->category_id;
        $game->slider = $request->slider;
        $game->price = $request->price;
        if($game->save()){
            return redirect('games')->with('message', 'The game: ' . $game->name . ' was successfully edited!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        if($game->delete()){
            return redirect('games')->with('message', 'The game: ' . $game->name . ' was successfully deleted!');
        }
    }
}
