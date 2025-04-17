<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'is_project', 'self_capture', 'client_prefix',
        'client_logo', 'address', 'phone_number', 'city'
    ];

    protected $dates = ['deleted_at'];
}
