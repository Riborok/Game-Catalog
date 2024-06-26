<?php

namespace App\Utils;

class Other {
    public static function mb_ucfirst($string, $encoding = 'UTF-8') {
        return mb_strtoupper(mb_substr($string, 0, 1, $encoding), $encoding) . mb_substr($string, 1, mb_strlen($string, $encoding), $encoding);
    }
    public static function mb_lcfirst($string, $encoding = 'UTF-8') {
        return mb_strtolower(mb_substr($string, 0, 1, $encoding), $encoding) . mb_substr($string, 1, mb_strlen($string, $encoding), $encoding);
    }
    public static function getLastWord($string) {
        $parts = explode('.', $string);
        return end($parts);
    }
}
