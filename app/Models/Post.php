<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\PostStatus;
use Exception;
use Goutte\Client;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'detail',
        'image',
        'meta_keyword',
        'meta_description',
        'total_view',
        'status',
        'source_id'
    ];

    public function cates()
    {
        return $this->hasManyThrough(Category::class, PostCate::class, 'post_id', 'id', 'id', 'cate_id');
    }

    public static function front_get_list($params = []) {
        $data = [];
        $data = self::where('status', PostStatus::Show);
        if (!empty($params['cates'])) {
            $data = $data->with('cates');
        }
        if (!empty($params['page']) && !empty($params['limit'])) {
            $data = $data->offset(($params['page'] - 1)*$params['limit'])->limit($params['limit']);
        }
        $data = $data->orderBy('id', 'desc')->get();
        return $data;
    }

    public static function evaCrawler($page = 1, $limit = 8) {
        $url = 'https://eva.vn/ajax/box_bai_viet_trang_chuyen_muc/index/73/pc/1/'.$page.'/'.$limit.'/0/1/0/1';
        $client = new Client();
        $crawler = $client->request('GET', $url);
        $crawler->filter('.eva-news-trend-h-items')->each(function ($node){
            $href = $node->filter('.eva-news-trend-h__img a')->attr('href');
            $img = $node->filter('.eva-news-trend-h__img a img');
            $title = $img->attr('alt');
            $img = $img->attr('data-original');
            $post = self::where('source_id', $href)->first();
            if (empty($post)) {
                self::create([
                    'name' => $title,
                    'slug' => createSlug($title),
                    'image' => $img,
                    'source_id' => $href,
                    'status' => PostStatus::Hide
                ]);
            }
        });
    }

    public static function evaDetailCrawler() {
        $limit = 200;
        $data = Post::whereNull('detail')
            ->whereNotNull('source_id')
            ->limit($limit)
            ->get();
        $client = new Client();
        foreach ($data as $v) {
            try {
                $crawler = $client->request('GET', $v->source_id);
                $htmlContent = $crawler->filter('article.eva-cont-art')->text();
                if (!empty($htmlContent)) {
                    $crawler->filter('article.eva-cont-art')->each(function ($node) use($v){
                        $description = $node->filter('.eva-cont-art__sum')->text();
                        $detail = $node->filter('#baiviet-container')->html();
                        $v->description = $description;
                        $v->detail = customEvaHtml($detail);
                        $v->status = PostStatus::Show;
                        $v->save();
                    });
                }
            } catch(Exception $e) {
                echo $e->getMessage().PHP_EOL;
                echo $v->source_id.PHP_EOL;
                $v->detail = '';
                $v->status = PostStatus::Hide;
                $v->save();
            }
        }

    }
}
