<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatmentcategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'treatment_categories';

    protected $fillable = [
        'user_id',
        'treatmentmodule_id',
        'video_id',
        'image_id',
        'treatmentcategory_name',
        'privately_insured_cuecard_description',
        'privately_insured_patient_short_description',
        'privately_insured_patient_long_description',
        'privately_insured_doctor_long_description',
        'legaly_insured_cuecard_description',
        'legaly_insured_patient_short_description',
        'legaly_insured_patient_long_description',
        'legaly_insured_doctor_long_description',
        
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function treatment()
    {
        $this->hasOne(Treatment::class);
    }

    public function treatmentmodule()
    {
        return $this->belongsTo(Treatmentmodule::class);
    }

}
