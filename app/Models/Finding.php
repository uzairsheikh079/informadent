<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finding extends Model
{
   use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'findings';
    protected $fillable = [
        'user_id',
		'document_id',
		'diagnose_id',
		'image_id',
		'privately_insured_cuecard_description',
        'privately_insured_patient_short_description',
        'privately_insured_patient_long_description',
        'privately_insured_doctor_long_description',
        'legaly_insured_cuecard_description',
        'legaly_insured_patient_short_description',
        'legaly_insured_patient_long_description',
        'legaly_insured_doctor_long_description',
		'finding_name',
		'step',
		'slug',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function diagnose()
    {
        return $this->belongsTo(Diagnose::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

}
