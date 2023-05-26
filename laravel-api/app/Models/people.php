<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class people extends Model
{
    use HasFactory;

    protected $table = 'people';

    protected $fillable = [
    'Name',
    'Last_name',
    'Phone_number',
    'Street',
    'City',
    'Country',
    ];
}
