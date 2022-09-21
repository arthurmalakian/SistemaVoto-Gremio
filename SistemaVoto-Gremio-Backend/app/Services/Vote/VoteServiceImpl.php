<?php

namespace App\Services\Vote;

use App\Models\Plate;
use App\Models\Vote;
use App\Models\VotingPeriod;

class VoteServiceImpl implements VoteService
{
    public function vote($voteData)
    {
        try{
            $period = VotingPeriod::orderBy('created_at','desc')->first();
            if($period == null){
                return response([
                    'message' => 'Período de votação não foi iniciado.'
                ],403);
            }
            $plate = Plate::find($voteData['plate_id']);
            if($plate == null){
                return response([
                    'message' => 'Chapa não existe.'
                ],403);
            }
            Vote::create($voteData);
            return response([
                'message' => 'Voto cadastrado.'
            ],201);
        }catch(\Exception $exception){
            return response([
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'traceback' => $exception->getTraceAsString()
            ],500);
        }
    }
}
