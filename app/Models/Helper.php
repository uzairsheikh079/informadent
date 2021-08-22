<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Helper extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'helpers';

    protected $fillable = [
        'practice_id',
        'helper_name',
    ];

    public function practice()
    {
        return $this->belongsTo(Practice::class);
    }
}
