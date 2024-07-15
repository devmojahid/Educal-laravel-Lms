<?php

use Carbon\Carbon;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;

if (!function_exists('custom_function')) {
    function custom_function()
    {
        return 'Hello, this is a custom function!';
    }
}

if (!function_exists('getSidebarInfo')) {
    function getSidebarInfo($key)
    {
        return App\Models\SidebarInfo::value($key);
    }
}

if (!function_exists('monthDayYear')) {
    function monthDayYear($key, $format = 'M d, Y')
    {
        return Carbon::parse($key)->format($format);
    }
}

/**
 * Get Time Format from Carbon
 * @param $key
 * @param string $format
 */
if (!function_exists('timeFormat')) {
    function timeFormat($key, $format = 'h:i a')
    {
        return Carbon::parse($key)->format($format);
    }
}

if (!function_exists('numberFormat')) {
    function numberFormat($number)
    {
        return number_format((float)$number, 2, '.', '');
    }
}

/**
 * Get the course price with discount and free or not
 * @param $course
 * @return string
 */

if (!function_exists('getCoursePrice')) {
    function getCoursePrice($course)
    {
        $price = $course->price;
        $discount = $course->discount_price;
        $priceFreeTitle = __('dashboard.free');
        if ($discount != null) {
            $discountPrice = $course->discount_price;
            return currency_symbol($discountPrice);
        } elseif ($price != null) {
            return currency_symbol($price);
        } else {
            return $priceFreeTitle;
        }
    }
}

/**
 * Get the Book just discount price
 * @param $course
 * @return string
 */

if (!function_exists('getCourseDiscountPrice')) {
    function getBookDiscountPrice($item)
    {
        $discount = $item->discount_price;
        if ($discount != null) {
            return currency_symbol($discount);
        } else {
            return null;
        }
    }
}

/**
 * Get the Book price with discount and free or not
 * @param $course
 * @return string
 */

if (!function_exists('getBookPrice')) {
    function getBookPrice($item)
    {
        $price = $item->price;
        $discount = $item->discount_price;
        $priceFreeTitle = __('dashboard.free');
        if ($discount != null) {
            $discountPrice = $item->discount_price;
            return currency_symbol($discountPrice);
        } elseif ($price != null) {
            return currency_symbol($price);
        } else {
            return $priceFreeTitle;
        }
    }
}




/**
 * Generate a script for deleting a Item using SweetAlert and AJAX.
 * @param string $routeName The name of the route for deleting a course Item.
 * @return string
 */
if (!function_exists('getSystemSetting')) {
    function getSystemSetting($key, $element = null)
    {
        $systemSetting = App\Models\SystemSetting::where('key', $key)->get();
        if ($systemSetting) {
            foreach ($systemSetting as $key => $setting) {
                $settingValue = json_decode($setting['value'], true);
                return $settingValue[$element];
            }
        } else {
            return null;
        }
    }
}

// options api 
if (!function_exists('getOptions')) {
    function getOptions($key, $element = null)
    {
        $systemSetting = App\Models\SystemSetting::where('key', $key)->first();
        if ($systemSetting) {
            $settingValue = json_decode($systemSetting['value'], true);
            return $settingValue[$element] ?? null;
        } else {
            return null;
        }
    }
}


if (!function_exists('currency_load')) {
    function currency_load()
    {
        if (session()->has('currency_info')) {
            $currency = session()->get('currency_info');
            return $currency;
        } else {
            $currency = App\Models\Currency::where('is_default', 'yes')->first();
            if ($currency) {
                return $currency->code;
            } else {
                return 'USD';
            }
        }
    }
}

// set currency symbol and price change with exchange rates 
if (!function_exists('currency_symbol')) {
    function currency_symbol($price)
    {
        $currency = currency_load()['code'] ?? 'USD';
        $currency_symbol = App\Models\Currency::where('code', $currency)->first();
        if ($currency_symbol) {
            $symbol = $currency_symbol->symbol;
            $exchange_rate = $currency_symbol->exchange_rate;
            $price = $price * $exchange_rate;
            return $symbol . number_format((float)$price, 2, '.', '');
        } else {
            return '$' . number_format((float)$price, 2, '.', '');
        }
    }
}
if (!function_exists('currency_symbol_only')) {
    function currency_symbol_only()
    {
        $currencyInfo = currency_load(); // Assuming currency_load() returns an array

        if (is_array($currencyInfo) && isset($currencyInfo['code'])) {
            $currency = $currencyInfo['code'];
            $currency_symbol = App\Models\Currency::where('code', $currency)->first();

            if ($currency_symbol) {
                $symbol = $currency_symbol->symbol;
                return $symbol;
            } else {
                return '$';
            }
        } else {
            return '$'; // Provide a default symbol
        }
    }
}


if (!function_exists('social_shear')) {
    function social_shear($url, $title)
    {
        $url = urlencode(url()->current());
        $html = '<ul>';
        $html .= '<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=' . $url . '&amp;src=sdkpreparse" class="fb"><i class="social_facebook"></i></a></li>';
        $html .= '<li><a href="https://twitter.com/intent/tweet?text=' . $title . '&amp;url=' . $url . '&amp;via=twitterdev&amp;hashtags=example%2Cdemo" target="_blank" class="tw"><i class="social_twitter"></i></a></li>';
        $html .= '</ul>';
        return $html;
    }
}


function extractVideoID($url)
{
    $pattern = '/(?:\?v=|\/embed\/|\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/';

    if (preg_match($pattern, $url, $matches)) {
        return $matches[1];
    } else {
        return null;
    }
}

// youtube video id 
if (!function_exists('getYoutubeVideoId')) {
    function getYoutubeVideoId($url)
    {
        $video_id = explode("?v=", $url);
        if (empty($video_id[1])) {
            $video_id = explode("/v/", $url);
        }
        $video_id = explode("&", $video_id[1]);
        $video_id = $video_id[0];
        return $video_id;
    }
}

// get youtube video thumbnail
if (!function_exists('getYoutubeVideoThumbnail')) {
    function getYoutubeVideoThumbnail($url)
    {
        $video_id = getYoutubeVideoId($url);
        $thumbnail = 'https://img.youtube.com/vi/' . $video_id . '/hqdefault.jpg';
        return $thumbnail;
    }
}

// get youtube video embed url
if (!function_exists('getYoutubeVideoEmbedUrl')) {
    function getYoutubeVideoEmbedUrl($url)
    {
        $video_id = getYoutubeVideoId($url);
        $embed_url = 'https://www.youtube.com/embed/' . $video_id;
        return $embed_url;
    }
}

// get vimeo video id

if (!function_exists('getVimeoVideoId')) {
    function getVimeoVideoId($url)
    {
        $video_id = explode("/", $url);
        $video_id = $video_id[3];
        return $video_id;
    }
}


// get vimeo video thumbnail

if (!function_exists('getVimeoVideoThumbnail')) {
    function getVimeoVideoThumbnail($url)
    {
        $video_id = getVimeoVideoId($url);
        $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$video_id.php"));
        $thumbnail = $hash[0]['thumbnail_large'];
        return $thumbnail;
    }
}

// get vimeo video embed url

if (!function_exists('getVimeoVideoEmbedUrl')) {
    function getVimeoVideoEmbedUrl($url)
    {
        $video_id = getVimeoVideoId($url);
        $embed_url = 'https://player.vimeo.com/video/' . $video_id;
        return $embed_url;
    }
}

//CustomHTMLParser 
if (!function_exists('CustomHTMLParser')) {
    function CustomHTMLParser($html)
    {
        $dom = new \DOMDocument();
        $dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $html = $dom->saveHTML();
        return $html;
    }
}

// senitize html input 
if (!function_exists('sanitizeInput')) {
    function sanitizeInput($input)
    {
        $sanitized = preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/i', '', $input);
        $allowedTags = '<p><a><ul><li><ol><strong><svg><path><em><br><hr><h1><h2><h3><h4><h5><h6><img><iframe><div><span><table><thead><tbody><tr><th><td><blockquote><code><pre><del><ins><small><big><strike><u><center><font><b><i><u><s><sub><sup><img><video><audio><source><object><embed><param><iframe><figure><figcaption><mark><abbr><address><cite><bdo><q><dfn><kbd><samp><var><time><progress><meter><ruby><rt><rp><wbr><details><summary><menuitem><menu><command><legend><fieldset><datalist><keygen><output><style><link><meta><title><base><head><body><html><form><input><select><option><textarea><button><label><fieldset><legend><datalist><keygen><output>';
        $sanitized = strip_tags($sanitized, $allowedTags);
        return new \Illuminate\Support\HtmlString($sanitized);
    }
}

// senitize with htmlspecialchar
if (!function_exists('sanitizeInputWithHtmlSpecialChars')) {
    function sanitizeInputWithHtmlSpecialChars($input)
    {
        $sanitized = preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/i', '', $input);
        $allowedTags = '<p><a><ul><li><ol><strong><svg><path><em><br><hr><h1><h2><h3><h4><h5><h6><img><iframe><div><span><table><thead><tbody><tr><th><td><blockquote><code><pre><del><ins><small><big><strike><u><center><font><b><i><u><s><sub><sup><img><video><audio><source><object><embed><param><iframe><figure><figcaption><mark><abbr><address><cite><bdo><q><dfn><kbd><samp><var><time><progress><meter><ruby><rt><rp><wbr><details><summary><menuitem><menu><command><legend><fieldset><datalist><keygen><output><style><link><meta><title><base><head><body><html><form><input><select><option><textarea><button><label><fieldset><legend><datalist><keygen><output>';
        $sanitized = strip_tags($sanitized, $allowedTags);
        return htmlspecialchars($sanitized);
    }
}

// senitize html in json input
if (!function_exists('sanitizeJsonInput')) {
    function sanitizeJsonInput($input)
    {
        if ($input === null) {
            return null; // or handle it in a way that makes sense for your application
        }

        $sanitized = preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/i', '', $input);

        $allowedTags = '<p><a><ul><li><ol><strong><svg><path><em><br><hr><h1><h2><h3><h4><h5><h6><img><iframe><div><span><table><thead><tbody><tr><th><td><blockquote><code><pre><del><ins><small><big><strike><u><center><font><b><i><u><s><sub><sup><img><video><audio><source><object><embed><param><iframe><figure><figcaption><mark><abbr><address><cite><bdo><q><dfn><kbd><samp><var><time><progress><meter><ruby><rt><rp><wbr><details><summary><menuitem><menu><command><legend><fieldset><datalist><keygen><output><style><link><meta><title><base><head><body><html><form><input><select><option><textarea><button><label><fieldset><legend><datalist><keygen><output>';

        $sanitized = strip_tags($sanitized, $allowedTags);

        return new \Illuminate\Support\HtmlString($sanitized);
    }
}

// senitize html in json input return plain text
if (!function_exists('sanitizeJsonInputPlainText')) {
    function sanitizeJsonInputPlainText($input)
    {
        if ($input === null) {
            return null; // or handle it in a way that makes sense for your application
        }

        $sanitized = preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/i', '', $input);

        $allowedTags = '<p><a><ul><li><ol><strong><svg><path><em><br><hr><h1><h2><h3><h4><h5><h6><img><iframe><div><span><table><thead><tbody><tr><th><td><blockquote><code><pre><del><ins><small><big><strike><u><center><font><b><i><u><s><sub><sup><img><video><audio><source><object><embed><param><iframe><figure><figcaption><mark><abbr><address><cite><bdo><q><dfn><kbd><samp><var><time><progress><meter><ruby><rt><rp><wbr><details><summary><menuitem><menu><command><legend><fieldset><datalist><keygen><output><style><link><meta><title><base><head><body><html><form><input><select><option><textarea><button><label><fieldset><legend><datalist><keygen><output>';

        $sanitized = strip_tags($sanitized, $allowedTags);

        return $sanitized;
    }
}

if (!function_exists('addHttp')) {
    function addHttp($url)
    {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }
        return $url;
    }
}

// create slug
if (!function_exists('createSlug')) {
    function createSlug($title, $model, $id = null, $old_slug = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        if ($id) {
            // $slug = $old_slug;
            $slug = $old_slug ?? $slug;

            return $slug;
        }

        while ($model::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }

    // is json
    if (!function_exists('is_json')) {
        function is_json($string)
        {
            try {
                json_decode($string);
                return json_last_error() === JSON_ERROR_NONE;
            } catch (Exception $e) {
                return false;
            }
        }
    }

    // is serialized

    if (!function_exists('is_serialized')) {
        function is_serialized($data)
        {
            if (!is_string($data)) {
                return false;
            }
            $data = trim($data);
            if ('N;' == $data) {
                return true;
            }
            if (!preg_match('/^([adObis]):/', $data, $badions)) {
                return false;
            }
            switch ($badions[1]) {
                case 'a':
                case 'O':
                case 's':
                    if (preg_match("/^{$badions[1]}:[0-9]+:.*[;}]\$/s", $data)) {
                        return true;
                    }
                    break;
                case 'b':
                case 'i':
                case 'd':
                    if (preg_match("/^{$badions[1]}:[0-9.E-]+;\$/", $data)) {
                        return true;
                    }
                    break;
            }
            return false;
        }
    }
}
