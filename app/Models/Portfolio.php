<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function User() {
        return $this->belongsTo(About::class, 'uid', 'id');
    }

    protected $fillable = [
        'uid',
        'portfolio_image',
    ];
}
