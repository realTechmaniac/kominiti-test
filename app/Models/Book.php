<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $casts    = ['number_of_pages' => 'int'];

    protected $fillable = ['name', 'isbn', 'authors', 'country', 'number_of_pages', 'publisher', 'release_date'];

}
