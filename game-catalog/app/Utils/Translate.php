<?php

namespace App\Utils;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Stichoza\GoogleTranslate\GoogleTranslate;

class Translate
{
    private static $translator;

    public static function translateFields($data, $fields)
    {
        self::init();

        foreach ($data as $curr) {
            foreach ($fields as $field) {
                $curr->{$field} = self::cacheTranslation($curr->{$field});
            }
        }
    }

    private static function init()
    {
        if (!isset(self::$translator)) {
            self::$translator = new GoogleTranslate(App::getLocale());
            self::$translator->setOptions([
                'curl' => [
                    CURLOPT_SSL_VERIFYPEER => false,
                ],
            ]);
        }
    }

    private static function cacheTranslation($text)
    {
        $cacheKey = 'translation_' . $text . '_' . App::getLocale();
        return Cache::remember($cacheKey, now()->addHours(24), function () use ($text) {
            return self::$translator->translate($text);
        });
    }
}
