<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdata extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'user_data';
    protected $fillable = [
        'practice_id',
        'image_id',
        'user_id',
        'user_salutation',
        'user_title',
        'user_firstname',
        'user_lastname',
        'user_telephone',
    ];

    public function practice()
    {
        return $this->belongsTo(Practice::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
