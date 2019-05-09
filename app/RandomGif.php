<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RandomGif extends Model
{
    protected $table = 'random_gifs';
    protected $fillable = [];
    protected $hidden = ['id'];
    protected $primaryKey = 'id';

}
