<?php

namespace App\Http\Controllers;

use App\Services\VotingPeriod\VotingPeriodServiceImpl as VotingPeriodService;
use Illuminate\Http\Request;

class VotingPeriodController extends Controller
{

    private $votingPeriodService;

    public function __construct()
    {
        $this->votingPeriodService = new VotingPeriodService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->votingPeriodService->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function open()
    {
        return $this->votingPeriodService->open();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->votingPeriodService->get($id);
    }

    /**
     * Display the most recent specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function last()
    {
        return $this->votingPeriodService->getLast();
    }
    /**
     * Close the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function close()
    {
        return $this->votingPeriodService->close();
    }
}
