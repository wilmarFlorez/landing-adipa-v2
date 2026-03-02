<?php

if (! function_exists('formatPrice')) {
    /**
     * Format an integer price in CLP to a localized string.
     * Example: 150000 → '$150.000'
     */
    function formatPrice(int $price): string
    {
        return '$' . number_format($price, 0, ',', '.');
    }
}

if (! function_exists('formatDate')) {
    /**
     * Format a Y-m-d date string to a Spanish long-form date.
     * Example: '2026-03-15' → '15 de marzo de 2026'
     */
    function formatDate(string $date): string
    {
        $months = [
            1  => 'enero',
            2  => 'febrero',
            3  => 'marzo',
            4  => 'abril',
            5  => 'mayo',
            6  => 'junio',
            7  => 'julio',
            8  => 'agosto',
            9  => 'septiembre',
            10 => 'octubre',
            11 => 'noviembre',
            12 => 'diciembre',
        ];

        [$year, $month, $day] = explode('-', $date);

        return (int) $day . ' de ' . $months[(int) $month] . ' de ' . $year;
    }
}
