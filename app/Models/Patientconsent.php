<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patientconsent extends Model
{
    use HasFactory;

    protected $table =  'patient_consents';

    protected $fillable = [
        'consent_name',
    ];
}
