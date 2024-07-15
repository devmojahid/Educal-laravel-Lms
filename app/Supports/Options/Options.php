<?php

namespace App\Supports\Options;

use App\Models\Options as OptionsModel;
use App\Supports\Options\Contracts\OptionsContracts;

class Options implements OptionsContracts
{
    /**
     * Get all options.
     *
     * @return array
     */
    public static function all(): array
    {
        $options = OptionsModel::all();

        return $options->toArray();
    }

    /**
     * Get the specified option value.
     *
     * @param string $key
     * @param null|array|string $default
     * @return null|array|string
     */
    public static function get(string $key, array|string $default = null): null|array|string
    {
        $option = OptionsModel::where('key', $key)->first();

        if (empty($option)) {
            return $default;
        }

        $value = $option->value;

        if (is_serialized($value)) {
            $value = unserialize($value);
        }

        if (is_json($value)) {
            $value = json_decode($value, true);
        }

        return $value;
    }

    /**
     * Set a given option value.
     *
     * @param string $key
     * @param array|string $value
     * @return bool
     */
    public static function set(string $key, array|string $value): bool
    {
        $option = OptionsModel::where('key', $key)->first();

        if (empty($option)) {
            $option = new OptionsModel();
            $option->key = $key;
        }

        $option->value = $value;
        $option->save();

        return true;
    }

    /**
     * Remove the specified option.
     *
     * @param string $key
     * @return bool
     */
    public static function delete(string $key): bool
    {
        $option = OptionsModel::where('key', $key)->first();

        if (empty($option)) {
            return false;
        }

        $option->delete();

        return true;
    }

    /**
     * Determine if the given option exists.
     *
     * @param string $key
     * @return bool
     */
    public static function has(string $key): bool
    {
        $option = OptionsModel::where('key', $key)->first();

        return !empty($option);
    }

    /**
     * Get all options keys.
     *
     * @return array
     */
    public static function keys(): array
    {
        $options = OptionsModel::all();

        return $options->pluck('key')->toArray();
    }

    /**
     * Get all options values.
     *
     * @return array
     */

    public static function values(): array
    {
        $options = OptionsModel::all();

        return $options->pluck('value')->toArray();
    }

    /**
     * Get all options.
     *
     * @return array
     */

    public static function options(): array
    {
        $options = OptionsModel::all();

        return $options->pluck('value', 'key')->toArray();
    }
}