<?php

namespace App\Utils;

class TextHighlighter
{
    public static function highlightText($text)
    {
        $text = preg_replace_callback('/\bhttps?:\/\/\S+\b/', function($matches) {
            $url = $matches[0];

            if (strlen($url) > 50) {
                $url = preg_replace('/(https?:\/\/[^\/]+\/)\S*/', '$1', $url) . '...';
            }

            return '<span style="color:green;">' . $url . '</span>';
        }, $text);

        $text = preg_replace('/\b[a-zA-Z0-9.-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}\b/',
            '<span style="color:red;">$0</span>', $text);

        $text = preg_replace('/\b\d+\b/', '<span style="color:blue;">$0</span>', $text);

        return $text;
    }
}
