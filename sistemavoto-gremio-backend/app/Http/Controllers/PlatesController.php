<?php

namespace App\Http\Controllers;

use App\Http\Requests\Plate\SavePlateRequest;
use App\Http\Requests\Plate\UpdatePlateRequest;
use App\Services\Plate\PlateServiceImpl as PlateService;
use Illuminate\Http\Request;

class PlatesController extends Controller
{
    private $platesService;

    public function __construct()
    {
        $this->platesService = new PlateService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->platesService->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePlateRequest $request)
    {
        $plateData = $request->only('name','president_id','vice_president_id');
        return $this->platesService->save($plateData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->platesService->get($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlateRequest $request, $id)
    {
        $plateData = $request->only('name','president_id','vice_president_id');
        return $this->platesService->update($id,$plateData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->platesService->delete($id);
    }
}
