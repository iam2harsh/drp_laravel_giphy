<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewRandomGif extends Model
{
    protected $table = 'new_random_gifs';
    protected $fillable = [];
    protected $hidden = ['id'];
    protected $primaryKey = 'id';

}
