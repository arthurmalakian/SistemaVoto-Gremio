<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VotingPeriod extends Model
{
    use HasFactory,SoftDeletes;


    // public function votes()
    // {
    //     return $this->hasMany(Votes::class,'period_id','id');
    // }

}
