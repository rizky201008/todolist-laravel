<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    use HasFactory;
    protected $fillable=["todo"];
    // public function toSearchableArray()
    // {
    //     $array = $this->toArray();
    //     return $array;
    // }
}
