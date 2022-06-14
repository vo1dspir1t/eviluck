<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class About extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    public function Admin() {
        return $this->hasOne(Admin::class, 'uid');
    }
    public function Images() {
        return $this->hasMany(Portfolio::class, 'uid');
    }

    protected $fillable = [
        'avatar',
        'initials',
        'profession',
        'info',
        'email',
        'remember_token',
        'contact_email',
        'phone',
        'password',
        'linkDesc',
        'link',
    ];

    protected $hidden = [
        'password', 'email', 'remember_token',
    ];

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = Hash::make($password);
    }
}
