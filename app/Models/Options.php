<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    use HasFactory;

    protected $table = 'options';
    protected $fillable = ['key', 'value'];
    public $timestamps = false;

    public static function all($columns = ['*'])
    {
        $options = parent::all($columns);

        $options = $options->mapWithKeys(function ($option) {
            $value = $option->value;

            if (is_serialized($value)) {
                $value = unserialize($value);
            }

            if (is_json($value)) {
                $value = json_decode($value, true);
            }

            return [$option->key => $value];
        });

        return $options;
    }

    public static function get($key, $default = null)
    {
        $option = self::where('key', $key)->first();

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

    public static function set($key, $value)
    {
        $option = self::where('key', $key)->first();

        if (empty($option)) {
            $option = new self();
            $option->key = $key;
        }

        if (is_array($value)) {
            $value = json_encode($value);
        }

        $option->value = $value;
        $option->save();
    }
}