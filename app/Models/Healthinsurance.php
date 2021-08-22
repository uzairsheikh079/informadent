<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Healthinsurance extends Model
{
    use HasFactory;

    protected $table = 'health_insurances';

    protected $fillable = [
        'healthinsurance_name',
    ];
}
