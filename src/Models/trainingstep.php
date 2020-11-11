<?php

namespace jbirch8865\ReactTour\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trainingstep extends Model
{
    use HasFactory;
    protected $fillable = ['name','training_group'];

}
