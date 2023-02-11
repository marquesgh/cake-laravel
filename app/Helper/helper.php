<?php

/**
 * Convert the money values.
 *
 * @param float $value
 *
 * @return string
 */

function currencyFormat(float $value): string
{
    return '$ ' . number_format($value, 2);
}
