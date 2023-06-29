<?php

namespace Awcodes\Assistant;

use NumberFormatter;

class Format
{
    public static function article(string $word, ?string $plural = 'an', ?string $singular = 'a'): string
    {
        return in_array(strtolower(substr($word, 0, 1)), ['a', 'e', 'i', 'o', 'u']) ?  : $singular . ' ' . $word;
    }

    public static function cleanPhone(string $value): array|string|null
    {
        return preg_replace("/\D/", '', $value);
    }

    public static function currency(float $value, ?string $locale = 'en_US', ?string $currency = 'USD'): string
    {
        $fmt = new NumberFormatter($locale, NumberFormatter::CURRENCY);
        $fmt->setAttribute(NumberFormatter::FRACTION_DIGITS, 0);

        return $fmt->formatCurrency($value, $currency);
    }

    public static function number(float $value, ?string $locale = 'en_US'): string
    {
        $fmt = new NumberFormatter($locale, NumberFormatter::DECIMAL);
        $fmt->setAttribute(NumberFormatter::FRACTION_DIGITS, 0);

        return $fmt->format($value);
    }

    public static function phone(string $value): string
    {
        $value = preg_replace("/\D/", '', $value);

        return '(' . substr($value, 0, 3) . ') ' . substr($value, 3, 3) . '-' . substr($value, 6);
    }
}