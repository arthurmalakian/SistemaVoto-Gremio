<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vote\VoteRequest;
use App\Services\Vote\VoteServiceImpl as VoteService;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    private $voteService;

    public function __construct()
    {
        $this->voteService = new VoteService;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function vote(VoteRequest $request)
    {
        $voteData = $request->only('cpf','plate_id');
        return $this->voteService->vote($voteData);
    }

}
