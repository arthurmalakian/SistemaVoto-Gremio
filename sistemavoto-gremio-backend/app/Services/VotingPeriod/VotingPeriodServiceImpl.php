<?php

namespace App\Services\VotingPeriod;

use App\Http\Resources\VotingPeriodResource;
use App\Models\VotingPeriod;

class VotingPeriodServiceImpl implements VotingPeriodService
{
    public function getAll()
    {
        try{
            $periods = VotingPeriod::withTrashed()->orderBy('created_at','desc')->get();
            return response(VotingPeriodResource::collection($periods),200);
        }catch(\Exception $exception){
            return response([
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'traceback' => $exception->getTraceAsString()
            ],500);
        }
    }

    public function get($period_id)
    {
        try{
            $period = VotingPeriod::withTrashed()->findOrFail($period_id);
            return response(new VotingPeriodResource($period),200);
        }catch(\Exception $exception){
            return response([
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'traceback' => $exception->getTraceAsString()
            ],500);
        }
    }


    public function getLast()
    {
        try{
            $period = VotingPeriod::withTrashed()->orderBy('created_at','desc')->first();
            return response(new VotingPeriodResource($period),200);
        }catch(\Exception $exception){
            return response([
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'traceback' => $exception->getTraceAsString()
            ],500);
        }
    }

    public function open()
    {
        try {
            $openPeriod = VotingPeriod::orderBy('created_at','desc')->first();

            if($openPeriod != null) {
                return response([
                    'message' => 'O período de votação já se encontra aberto.'
                ],403);
            }

            VotingPeriod::create();

            return response([
                'message' => 'Período de votação iniciado.'
            ],201);
        }catch(\Exception $exception) {
            return response([
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'traceback' => $exception->getTraceAsString()
            ],500);
        }
    }

    public function close()
    {
        try {
            $openPeriod = VotingPeriod::first();

            if($openPeriod == null) {
                return response([
                    'message' => 'Não existe período de votação em aberto.'
                ],403);
            }

            $openPeriod->delete();

            return response([
                'message' => 'Período de votação finalizado.'
            ],200);
        }catch(\Exception $exception) {
            return response([
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'traceback' => $exception->getTraceAsString()
            ],500);
        }
    }
}
