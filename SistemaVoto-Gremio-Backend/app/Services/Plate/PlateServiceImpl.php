<?php

namespace App\Services\Plate;

use App\Http\Resources\PlateResource;
use App\Models\Plate;
use Illuminate\Support\Facades\DB;

class PlateServiceImpl implements PlateService
{
    public function getAll()
    {
        try{
            $plates = Plate::with('president')->with('vicePresident')->orderBy('name','asc')->get();
            return response(new PlateResource($plates),200);
        }catch(\Exception $exception){
            return response([
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'traceback' => $exception->getTraceAsString()
            ],500);
        }
    }

    public function get($plate_id)
    {
        try{
            $plate = Plate::with('president')->with('vicePresident')->findOrFail($plate_id);
            return response(new PlateResource($plate),200);
        }catch(\Exception $exception){
            return response([
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'traceback' => $exception->getTraceAsString()
            ],500);
        }
    }

    public function save($plateData)
    {
        try {
            $plate = Plate::create($plateData);
            return response([
                'message' => 'Chapa criada'
            ],201);
        }catch(\Exception $exception) {
            DB::rollBack();
            return response([
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'traceback' => $exception->getTraceAsString()
            ],500);
        }
    }
    public function update($plate_id,$plateData)
    {
        try {
            $plate = Plate::with('president')->with('vicePresident')->findOrFail($plate_id);
            $plate->update($plateData);
            return response([
                'message' => 'Chapa editada.'
            ],200);
        }catch(\Exception $exception) {
            DB::rollBack();
            return response([
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'traceback' => $exception->getTraceAsString()
            ],500);
        }
    }
    public function delete($plate_id)
    {
        try{
            $plate = Plate::findOrFail($plate_id);
            $plate->delete();
            return response([
                'message' => 'Chapa excluida.'
            ],200);
        }catch(\Exception $exception){
            return response([
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'traceback' => $exception->getTraceAsString()
            ],500);
        }
    }
}
