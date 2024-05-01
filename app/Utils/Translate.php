<?php

namespace App\Utils;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Stichoza\GoogleTranslate\GoogleTranslate;

class Translate
{
    private static $translator;

    public static function translateFieldsDefault($data, $fields) { static::translateFields($data, $fields, App::getLocale()); }

    public static function translateFields($data, $fields, $language)
    {
        self::init();
        self::$translator->setTarget($language);
        foreach ($data as $curr) {
            foreach ($fields as $field) {
                $curr->{$field} = self::cacheTranslation($curr->{$field}, $language);
            }
        }
    }

    private static function init()
    {
        if (!isset(self::$translator)) {
            self::$translator = new GoogleTranslate();
            self::$translator->setOptions([
                'curl' => [
                    CURLOPT_SSL_VERIFYPEER => false,
                ],
            ]);
        }
    }

    private static function cacheTranslation($text, $language)
    {
        $cacheKey = 'translation_' . $text . '_' . $language;
        return Cache::remember($cacheKey, now()->addHours(24), function () use ($text) {
            return self::$translator->translate($text);
        });
    }
}
