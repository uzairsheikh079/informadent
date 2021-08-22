<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
		'treatmentmodule_id',
		'treatmentcategory_id',
		'video_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function treatmentmodule()
    {
        return $this->belongsTo(Treatmentmodule::class);
    }

    public function treatmentcategory()
    {
        return $this->belongsTo(Treatmentcategory::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
