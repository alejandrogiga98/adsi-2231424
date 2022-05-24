<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $game = new game;
        $game->name = 'Zelda Breath Wild';
        $game->image = 'images/zelda-bot.png';
        $game->description = 'Best Zelda Game';
        $game->user_id = 1;
        $game->category_id = 1;
        $game->slider = 1;
        $game->price = 69;
        $game->save();

        $game = new game;
        $game->name = 'Halo Infinite';
        $game->image = 'images/halo-infinite.png';
        $game->description = 'Halo Next-Gen';
        $game->user_id = 1;
        $game->category_id = 2;
        $game->slider = 0;
        $game->price = 59;
        $game->save();

        $game = new game;
        $game->name = 'God Of War';
        $game->image = 'images/god-of-war.png';
        $game->description = 'PlayStation best exclusive';
        $game->user_id = 1;
        $game->category_id = 3;
        $game->slider = 1;
        $game->price = 59;
        $game->save();

        $game = new game;
        $game->name = 'League of Legends';
        $game->image = 'images/league-of-legends.png';
        $game->description = 'PC exclusive game';
        $game->user_id = 3;
        $game->category_id = 4;
        $game->slider = 1;
        $game->price = 55.99;
        $game->save();

    }
}
