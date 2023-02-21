<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags',);
    }

    public function translations(): HasMany
    {
        return $this->hasMany(PostTranslation::class);
    }
}
