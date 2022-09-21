<?php

namespace App\Services\Plate;

interface PlateService
{
    public function getAll();
    public function get($plate_id);
    public function save($plateData);
    public function update($plate_id,$plateData);
    public function delete($plate_id);
}
