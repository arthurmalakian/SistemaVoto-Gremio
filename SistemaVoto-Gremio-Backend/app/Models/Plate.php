<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'president_id',
        'vice_president_id',
    ];


    public function president(){
        return $this->hasOne(Student::class,'id','president_id');
    }

    public function vicePresident(){
        return $this->hasOne(Student::class,'id','vice_president_id');
    }
}
