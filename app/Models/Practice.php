<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'practices';

    protected $fillable = [
        'clinic_id',
        'image_id',
        'practice_name',
        'street_no',
        'house_no',
        'post_code',
        'city',
        'country',
        'practice_address',
        'practice_email',
        'practice_telephone',
    ];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function helper()
    {
        $this->hasOne(Helper::class);
    }

    public function user()
    {
        $this->hasOne(User::class);
    }
}
