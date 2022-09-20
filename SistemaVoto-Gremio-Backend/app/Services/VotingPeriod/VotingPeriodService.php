<?php

namespace App\Services\VotingPeriod;

interface VotingPeriodService
{
    public function getAll();
    public function get($period_id);
    public function getLast();
    public function open();
    public function close();
}
