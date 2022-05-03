<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChecklistGroup extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','description'];

    //relationship with Checklist model
    public function checklists(){
        return $this->hasMany(Checklist::class);
    }




}
