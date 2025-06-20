<?php

if (!function_exists('formatear_precio')) {
    /**
     *
     * @param float $precio
     * @return string
     */
    function formatear_precio($precio)
    {
        return number_format($precio, 2, ',', '.');
    }
}