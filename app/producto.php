<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    //

    protected $fillable=['nombre','precio','cantidad','seccion','categoria','ruta'];
}
