<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'image_path', 'url', 'type'];

    public function lang()
    {
        return $this->belongsTo(Lang::class, 'type', 'name');
    }


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($project) {
            if ($project->imagem) {
                Storage::disk('public')->delete($project->imagem);
            }
        });
    }
}
