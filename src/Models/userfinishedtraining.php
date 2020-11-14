<?php

namespace jbirch8865\ReactTour\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userfinishedtraining extends Model
{
    use HasFactory;
    protected $fillable = ['training_id','user_id'];

    public function trainingstep()
    {
        return $this->hasOne('jbirch8865\ReactTour\Models\trainingstep','id','training_id');
    }
}
