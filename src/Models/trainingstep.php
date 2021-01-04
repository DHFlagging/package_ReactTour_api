<?php

namespace dhflagging\ReactTour\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trainingstep extends Model
{
    use HasFactory;
    protected $fillable = ['name','training_group'];

}
