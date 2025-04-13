<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'sub_name',
        'type',
        'city',
        'country',
        'description',
        'url',
        'date_start',
        'date_end'
    ];
}
