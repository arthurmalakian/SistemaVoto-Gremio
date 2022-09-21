<?php

namespace App\Models;

use App\Http\Resources\VoteResultResource;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VotingPeriod extends Model
{
    use HasFactory,SoftDeletes;


    public function getResultsVotesAttribute()
    {
        $results = Plate::with(['votes.plate' => function($query){
            $query->whereBetween('created_at',[
                Carbon::parse($this->created_at)->toDateString(),
                Carbon::parse($this->deleted_at)->toDateString()])->groupBy('id');
        }])->orderBy('name','asc')->get();
        return $results;
    }
}
