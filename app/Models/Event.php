<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $guarded = [];

    protected $casts = [
        'formal' => 'boolean',
    ];

    public function category():BelongsTo{
        return $this->belongsTo(Category::class,  'category_id','id');
    }


}
