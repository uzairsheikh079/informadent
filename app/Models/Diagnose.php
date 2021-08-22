<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnose extends Model
{
    use HasFactory;

    protected $table = 'diagnosis';

    protected $fillable = [
        'user_id',
        'diagnose_name',
        'parent_id',
        'degree',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
