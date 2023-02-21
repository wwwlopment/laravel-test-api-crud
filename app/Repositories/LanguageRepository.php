<?php

namespace App\Repositories;

use App\Models\Language;
use Illuminate\Support\Facades\App;

class LanguageRepository
{
    public function getLanguages()
    {
        return Language::all()->pluck(
            'id',
            'locale'
        );
    }

    public function getLangCode() {
        return Language::where('locale', App::getLocale())->first()->id ?? Language::$defaultLandCode;
    }
}
