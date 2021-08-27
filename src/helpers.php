<?php

/**
 * Verifica se um array possui somente chaves numéricas
 * 
 * https://stackoverflow.com/questions/173400/how-to-check-if-php-array-is-associative-or-sequential/4254008#4254008
 */
if (!function_exists('has_string_keys')) {
    function has_string_keys(array $array)
    {
        return count(array_filter(array_keys($array), 'is_string')) > 0;
    }
}
