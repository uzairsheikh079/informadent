<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'images';

    protected $fillable = [
        'user_id',
		'image_name',
        'image_title',
		'image_category',
        'privately_insured_cuecard_description',
        'privately_insured_patient_short_description',
        'privately_insured_patient_long_description',
        'privately_insured_doctor_long_description',
        'legaly_insured_cuecard_description',
        'legaly_insured_patient_short_description',
        'legaly_insured_patient_long_description',
        'legaly_insured_doctor_long_description',
		'image_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function practice()
    {
        $this->hasOne(Practice::class);
    }

    // public function user()
    // {
    //     $this->hasOne(User::class);
    // }

    public function document()
    {
        $this->hasOne(Document::class);
    }
}
