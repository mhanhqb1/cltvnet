<?php

function getHash256($str) {
	return hash("sha256", $str);
}

function getHmac512($str, $key) {
	return hash_hmac("sha512", $str, $key);
}

function hashParam($path, $id) {
	$ctime = time();
	echo $ctime.PHP_EOL;
	$version = '1.8.30';
	$secretKey = 'acOrvUS15XRW2o9JksiK1KgQ6Vbds8ZW';
	return getHmac512(
      $path.getHash256("ctime=$ctime"."id=$id"."version=$version"),
      $secretKey
    );
}

$a = hashParam('/api/v2/song/get/streaming', 'Z6ZCDAOC');
echo $a;
// https://zingmp3.vn/api/v2/song/get/streaming?id=Z6ZCDAOC&ctime=1675735434&version=1.8.30&sig=a657d1a206da95cea3cf6a150f26e615b2776937a58e2d633dcd77c4b540ee4187f526365740277428f5d1e35d94828864707c6361232a91435860267aa07179&apiKey=X5BM3w8N7MKozC0B85o4KMlzLZKhV00y
?>
