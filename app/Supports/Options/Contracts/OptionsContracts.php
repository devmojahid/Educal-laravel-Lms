<?php

namespace App\Supports\Options\Contracts;

interface OptionsContracts
{
    /**
     * Get all options.
     *
     * @return array
     */
    public static function all(): array;

    /**
     * Get the specified option value.
     *
     * @param string $key
     * @param null|array|string $default
     * @return null|array|string
     */

    public static function get(string $key, array|string $default = null): null|array|string;

    /**
     * Set a given option value.
     *
     * @param string $key
     * @param array|string $value
     * @return bool
     */

    public static function set(string $key, array|string $value): bool;

    /**
     * Remove the specified option.
     *
     * @param string $key
     * @return bool
     */

    public static function delete(string $key): bool;

    /**
     * Determine if the given option exists.
     *
     * @param string $key
     * @return bool
     */

    public static function has(string $key): bool;

    /**
     * Get all options keys.
     *
     * @return array
     */

    public static function Options(): array;
}