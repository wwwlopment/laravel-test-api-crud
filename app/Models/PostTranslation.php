<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    use HasFactory;
    protected $table = 'posts_translations';
    protected $fillable = [
        'title',
        'description',
        'content',
        'post_id',
        'lang_id',
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function language()
    {
        return $this->hasMany(Language::class, 'id', 'lang_id');
    }

    public function scopeByLangId($query, $lang_id)
    {
        return $query->where('lang_id', $lang_id);
    }
}
