<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
		'video_name',
        'video_title',
		'video_category',
        'privately_insured_cuecard_description',
        'privately_insured_patient_short_description',
        'privately_insured_patient_long_description',
        'privately_insured_doctor_long_description',
        'legaly_insured_cuecard_description',
        'legaly_insured_patient_short_description',
        'legaly_insured_patient_long_description',
        'legaly_insured_doctor_long_description',
		'video_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function text()
    {
        return $this->belongsTo(Text::class);
    }

     public function treatment()
    {
        $this->hasOne(Treatment::class);
    }

    
}
