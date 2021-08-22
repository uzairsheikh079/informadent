<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'clinics';

    protected $fillable = [
        'clinic_name',
    ];

    public function practice()
    {
        $this->hasOne(practice::class);
    }
}
