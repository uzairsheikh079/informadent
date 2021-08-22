<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatmentmodule extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'treatment_modules';

    protected $fillable = [
        'user_id',
        'treatmentmodule_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function treatment()
    {
        $this->hasOne(Treatment::class);
    }

    public function treatmentcategory()
    {
        $this->hasOne(TreatmentCategory::class);
    }
}
