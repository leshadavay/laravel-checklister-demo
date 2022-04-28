<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    //php artisan make:model Role -ms (migration,seeder)
    protected $fillable = ['name'];

}
