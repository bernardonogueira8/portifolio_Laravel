<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
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
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($education) {
            if ($education->url) {
                Storage::disk('public')->delete($education->url);
            }
        });
    }
}
