<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function Admin() {
        return $this->belongsTo(About::class);
    }

    protected $fillable = [
        'uid',
    ];
}
