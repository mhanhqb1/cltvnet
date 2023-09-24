<?php

/**
 * Write code on Method
 *
 * @return response()
 */

use App\Models\Cate;
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
        $str = preg_replace("/(\,|-|\.)/", '', $str);
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = preg_replace('/\s+/', ' ', $str);
        $str = str_replace("/", "-", $str);
        $str = str_replace(" ", "-", $str);
        $str = str_replace("?", "", $str);
        $str = str_replace("[", "", $str);
        $str = str_replace("]", "", $str);
        return strtolower($str);
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

if (!function_exists('editorUploadImages')) {
    function editorUploadImages($html)
    {
        if (preg_match_all('/src="(.*?)"/', $html, $match) >= 1) {
            foreach ($match[1] as $k => $v) {
                $image = explode('data:image', $v);
                if (!empty($image[1])) {
                    $image = explode(',', $image[1]);
                    if (!empty($image[1])) {
                        $data = base64_decode($image[1]);
                        $image_name = time() . $k. '.jpg';
                        $image_path = "/public/upload/" .  $image_name;
                        Storage::put($image_path, $data);
                        $html = str_replace($v, url('/storage/upload').'/'.$image_name, $html);
                    }
                }
            }
        }
        return $html;
    }
}

if (!function_exists('getFrontCates')) {
    function getFrontCates()
    {
        $data = [];
        $cates = Cate::get();
        foreach ($cates as $cate) {
            $data[$cate->type->value][] = $cate;
        }
        return $data;
    }
}
