<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'checkpoint_id',
        'image_id',
		'document_name',
        'document_title',
        'document_category',
		
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function checkpoint()
    {
        return $this->belongsTo(Checkpoint_id::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
