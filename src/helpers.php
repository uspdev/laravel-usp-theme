<?php

/**
 * Verifica se um array possui somente chaves numéricas
 */
if (!function_exists('has_string_keys')) {
    function has_string_keys(array $array)
    {
        return count(array_filter(array_keys($array), 'is_string')) > 0;
    }
}
