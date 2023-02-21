<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    public static $defaultLandCode = 1;

    protected $fillable = [
        'locale',
        'prefix',
    ];

    public function translation() {
        return $this->belongsTo(PostTranslation::class);
    }
}
