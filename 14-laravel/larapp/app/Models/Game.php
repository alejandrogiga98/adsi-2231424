<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'user_id',
        'category_id',
        'slider',
        'price'
    ];

    // Un juego le pertenece a un usuario
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // Un juego le pertenece a una catagoria
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
