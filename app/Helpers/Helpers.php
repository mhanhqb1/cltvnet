<?php

/**
 * Write code on Method
 *
 * @return response()
 */

use Carbon\Carbon;

if (!function_exists('convertYmdToMdy')) {
    function convertYmdToMdy($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date)->format('m-d-Y');
    }
}

if (!function_exists('createSlug')) {
    function createSlug($str, $delimiter = '-')
    {
        return strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
    }
}

if (!function_exists('getImageUrl')) {
    function getImageUrl($image)
    {
        return url($image);
    }
}

if (!function_exists('deleteFile')) {
    function deleteFile($file)
    {
        if ($file) {
            \File::delete(public_path($file));
        }
        return $file;
    }
}
