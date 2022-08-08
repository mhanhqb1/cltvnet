<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'detail',
        'is_series',
        'country_id',
        'year',
        'tags'
    ];

    public function videos()
    {
        return $this->hasMany(MovieVideo::class)->orderBy('position', 'asc');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cates()
    {
        return $this->hasManyThrough(Cate::class, MovieCate::class, 'movie_id', 'id');
    }

    public static function getList($params)
    {
        // Init
        $data = self::whereHas('videos');

        // Filter
        if (isset($params['is_series'])) {
            $data = $data->where('is_series', $params['is_series']);
        }
        if (!empty($params['cate_id'])) {
            $data = $data->whereHas('cates', function($q) use($params) {
                $q->where('cates.id', $params['cate_id']);
            });
        }
        if (!empty($params['country_id'])) {
            $data = $data->where('country_id', $params['country_id']);
        }
        if (!empty($params['slug'])) {
            $data = $data->where('movies.slug', 'like', '%'.$params['slug'].'%');
        }

        // Paginate
        if (!empty($params['limit']) && !empty($params['not_page'])) {
            $data = $data->limit($params['limit']);
        }
        $data = $data->orderBy('id', 'asc');

        if (!empty($params['not_page'])) {
            $data = $data->get();
        } else {
            $data = $data->paginate($params['limit']);
        }

        return $data;
    }
}
