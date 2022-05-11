<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'artista',
        'genero_id',
        'valor',

    ];
    //public function foto(){
    //    return $this->hasOne();
    //}
    public function genero(){
        return $this->belongsTo(Genero::class);
    }
    public function musica(){
        return $this->hasMany(Album::class);
    }

}
