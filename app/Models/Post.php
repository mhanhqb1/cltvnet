<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\PostStatus;

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
        'status',
        'type',
        'priority'
    ];

    public static $postTypes = [
        'post' => 0,
        'product' => 1
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
        if (!empty($params['name'])) {
            $data = $data->where('name', 'like', '%'.$params['name'].'%');
        }
        if (!empty($params['cate_ids'])) {
            $cateIds = $params['cate_ids'];
            if (!is_array($cateIds)) {
                $cateIds = explode(',', $cateIds);
            }
            $data = $data->whereHas('cates', function($q) use($cateIds){
                $q->whereIn('categories.id', $cateIds);
            });
        }
        if (!empty($params['home'])) {
            $data = $data->where('priority', '>', 0);
        }
        if (!empty($params['sort'])) {
            $sort = explode('-', $params['sort']);
            $data = $data->orderBy($sort[0], $sort[1]);
        } else {
            $data = $data->orderBy('id', 'desc');
        }
        if (isset($params['type'])) {
            $data = $data->where('type', $params['type']);
        }
        if (!empty($params['paginate'])) {
            $data = $data->paginate($params['limit']);
        } else {
            $data = $data->get();
        }
        return $data;
    }
}
