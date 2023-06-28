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
        'total_view',
        'status'
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
        $data = $data->get();
        return $data;
    }
}
