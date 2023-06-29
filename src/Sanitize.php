<?php

namespace Awcodes\Assistant;

class Sanitize
{
    public static function decimal($decimal)
    {
        return filter_var($decimal, FILTER_SANITIZE_NUMBER_FLOAT);
    }

    public static function email($string)
    {
        return filter_var($string, FILTER_SANITIZE_EMAIL);
    }

    public static function html($string): string
    {
        $string = strip_tags($string, '<a><strong><em><hr><br><p><u><ul><ol><li><dl><dt><dd><table><thead><tr><th><tbody><td><tfoot>');
        $string = addslashes($string);

        return htmlspecialchars($string);
    }

    public static function number($number)
    {
        return filter_var($number, FILTER_SANITIZE_NUMBER_INT);
    }

    public static function slug($string)
    {
        return filter_var($string, FILTER_SANITIZE_URL);
    }

    public static function string($string): string
    {
        $string = strip_tags($string);
        $string = addslashes($string);

        return htmlspecialchars($string);
    }

    public static function url($url)
    {
        return filter_var($url, FILTER_SANITIZE_URL);
    }
}