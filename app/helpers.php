<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

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

function editorUploadImages($html)
{
    $dom = new \DomDocument();

    try {
        $dom->loadHtml($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    } catch (\Exception $e) {
        return $html;
    }

    $images = $dom->getElementsByTagName('img');

    foreach ($images as $k => $img) {
        $data = $img->getAttribute('src');
        $data = explode(';', $data);
        if (empty($data[1])) {
            continue;
        }
        list(, $data) = explode(',', $data[1]);
        $data = base64_decode($data);
        $image_name = time() . $k . '.jpg';
        $image_path = "/public/upload/" .  $image_name;
        Storage::put($image_path, $data);
        $img->removeAttribute('src');
        $img->removeAttribute('data-filename');
        $img->setAttribute('src', url('/storage/upload').'/'.$image_name);
    }

    $html = $dom->saveHTML();
    return $html;
}

function getImageUrl($image) {
    if (strpos($image, 'http') !== false) {
        $imageUrl = $image;
    } else {
        $imageUrl = url('/storage/'.$image);
    }
    return $imageUrl;
}

function getFrontCates() {
    $data = Category::select('id', 'name', 'slug');

    $data = $data->get();
    return $data;
}

function getLastestPosts($limit = 3) {
    $data = Post::front_get_list([
        'limit' => $limit,
        'page' => 1
    ]);
    return $data;
}

function getFooterCates() {
    $data = Category::select('id', 'name', 'slug');

    $data = $data->limit(5)->get();
    return $data;
}

function callApi($url)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response, true);
}
