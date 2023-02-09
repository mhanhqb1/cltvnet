<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cate;
use App\Models\Country;
use App\Models\Movie;
use App\Models\MovieCate;
use App\Models\MovieVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Yajra\Datatables\Datatables;
class MoviesController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Movie();
        $routeName = explode('.', Route::currentRouteName());
        $pageTitle = ucfirst($routeName[1]).' '.ucfirst($routeName[2]);
        view()->share('pageTitle', $pageTitle);
        view()->share('videoSourceTypes', MovieVideo::$sourceTypes);
    }

    public function index()
    {
        return view('admin.movies.index');
    }

    public function indexData()
    {
        $data = $this->model->withCount('videos')->orderBy('id', 'desc');
        return Datatables::of($data)
            ->addColumn('image', function($item) {
                $html = '';
                if (!empty($item->image)) {
                    if (strpos($item->image, 'http') !== false) {
                        $html = '<img src="'.$item->image.'" width="200"/>';
                    } else {
                        $html = '<img src="'.url('/storage/'.$item->image).'" width="200"/>';
                    }

                }
                return $html;
            })
            ->addColumn('total_view', function($item) {
                return number_format($item->total_view);
            })
            ->addColumn('action', function ($item) {
                return '<a href="'.route('admin.movies.edit', $item->id).'" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i> Edit</a>
                <form action="'.route('admin.movies.delete', $item->id).'" method="POST" style="display:inline-block;">
                    <input type="hidden" name="_method" value="delete"/>
                    '.csrf_field().'
                    <input type="submit" class="btn btn-xs btn-danger" onclick="return window.confirm(\'Bạn muốn xóa item này không?\')" value="Delete"/>
                </form>
                ';
            })
            ->rawColumns(['image', 'action', 'total_view'])
            ->make(true);
    }

    public function add()
    {
        $cates = Cate::get();
        $countries = Country::get();
        return view('admin.movies.add', compact('cates', 'countries'));
    }

    public function edit($id)
    {
        $item = $this->model->find($id);
        $cates = Cate::get();
        $countries = Country::get();
        $movieCates = MovieCate::where('movie_id', $id)->pluck('cate_id')->toArray();
        $video = MovieVideo::where('movie_id', $id)->first();
        return view('admin.movies.edit', compact('item', 'cates', 'movieCates', 'countries', 'video'));
    }

    public function save(Request $request)
    {
        $image = '';
        $videoUrl = '';
        $nameValidate = 'required|unique:movies|max:255';
        if (!empty($request->id)) {
            $nameValidate = 'required|unique:movies,name,'.$request->id.'|max:255';
        }
        $request->validate([
            'name' => $nameValidate,
            'image' => 'nullable|image|max:1024',
            'video_url' => 'nullable|mimes:mp4,ogx,oga,ogv,ogg,webm|max:1024000'
        ]);
        $slug = createSlug($request->name);
        if (!empty($request->image)) {
            $image = $request->file('image')->storePubliclyAs('images', $slug.'-'.time().'.jpg', 'public');
        } elseif (!empty($request->image_url)) {
            $image = $request->image_url;
        }
        if (!empty($request->video_url)) {
            $videoUrl = $request->file('video_url')->storePubliclyAs('videos', $slug.'-'.time().'.mp4', 'public');
        }
        if (!empty($request->id)) {
            $item = $this->model->find($request->id);
        } else {
            $item = $this->model;
        }
        $item->name = $request->name;
        $item->slug = $slug;
        $item->year = !empty($request->year) ? $request->year : null;
        $item->tags = !empty($request->tags) ? $request->tags : null;
        $item->country_id = !empty($request->country_id) ? $request->country_id : 0;
        $item->description = !empty($request->description) ? $request->description : '';
        $item->is_series = !empty($request->is_series) ? $request->is_series : 0;
        $item->detail = !empty($request->detail) ? $request->detail : null;
        $item->daily_playlist_id = !empty($request->daily_playlist_id) ? $request->daily_playlist_id : null;
        $item->daily_video_id = !empty($request->daily_video_id) ? $request->daily_video_id : '';
        $item->ok_ru_id = !empty($request->ok_ru_id) ? $request->ok_ru_id : '';
        $item->ultra_keyword = !empty($request->ultra_keyword) ? $request->ultra_keyword : '';
        $item->total_view = !empty($request->total_view) ? $request->total_view : 0;
        if (!empty($image)) {
            $item->image = $image;
        }
        if ($item->save()) {
            MovieCate::where('movie_id', $item->id)->forceDelete();
            if (!empty($request->cates)) {
                foreach ($request->cates as $cate) {
                    MovieCate::create([
                        'cate_id' => $cate,
                        'movie_id' => $item->id
                    ]);
                }
            }
            if (!empty($videoUrl)) {
                MovieVideo::updateOrCreate([
                    'name' => 'Video',
                    'position' => 1,
                    'movie_id' => $item->id
                ], [
                    'slug' => 'video-1',
                    'movie_id' => $item->id,
                    'name' => 'Video',
                    'position' => 1,
                    'source_urls' => $videoUrl,
                    'source_type' => MovieVideo::$sourceTypeValue['direct']
                ]);
            }
            return redirect()->route('admin.movies.index')->with('success', 'Dữ liệu đã được cập nhật thành công');
        }
        return redirect()->route('admin.movies.index')->with('error', 'Dữ liệu cập nhật bị lỗi');
    }

    public function delete($id)
    {
        $this->model->find($id)->delete();
        $video = MovieVideo::where('movie_id', $id)->first();
        if (!empty($video)) {
            if (!empty($video->source_urls) && $video->source_type == MovieVideo::$sourceTypeValue['direct']) {
                if (\File::exists(public_path('storage/'.$video->source_urls))) {
                    \File::delete(public_path('storage/'.$video->source_urls));
                }
            }
            $video->delete();
        }
        return redirect()->route('admin.movies.index')->with('success', 'Dữ liệu đã được xóa thành công');
    }

    public function addVideo()
    {
        $movies = Movie::get();
        $sourceTypes = MovieVideo::$sourceTypes;
        return view('admin.movies.add_video', compact('movies', 'sourceTypes'));
    }

    public function editVideo($id)
    {
        $item = MovieVideo::find($id);
        $movies = Movie::get();
        $sourceTypes = MovieVideo::$sourceTypes;
        return view('admin.movies.edit_video', compact('item', 'movies', 'sourceTypes'));
    }

    public function saveVideo(Request $request)
    {
        $image = '';
        $request->validate([
            'name' => 'required|max:255',
            'movie_id' => 'required',
            'image' => 'nullable|image|max:1024'
        ]);
        $slug = createSlug($request->name);
        if (!empty($request->image)) {
            $image = $request->file('image')->storePubliclyAs('phim', $slug.'-'.time().'.jpg', 'public');
        } elseif (!empty($request->image_url)) {
            $image = $request->image_url;
        }
        if (!empty($request->id)) {
            $item = MovieVideo::find($request->id);
        } else {
            $item = new MovieVideo();
        }
        $item->name = $request->name;
        $item->slug = $slug;
        $item->description = !empty($request->description) ? $request->description : '';
        $item->detail = !empty($request->detail) ? $request->detail : '';
        $item->movie_id = $request->movie_id;
        $item->duration = !empty($request->duration) ? $request->duration : '';
        $item->position = !empty($request->position) ? $request->position : 0;
        $item->source_urls = !empty($request->source_urls) ? $request->source_urls : '';
        $item->source_type = !empty($request->source_type) ? $request->source_type : 0;
        $item->meta_description = !empty($request->meta_description) ? $request->meta_description : '';
        $item->meta_keywords = !empty($request->meta_keywords) ? $request->meta_keywords : '';
        if (!empty($image)) {
            $item->image = $image;
        }
        if ($item->save()) {
            return redirect()->route('admin.movies.edit', $item->movie_id)->with('success', 'Dữ liệu đã được cập nhật thành công');
        }
        return redirect()->route('admin.movies.edit', $item->movie_id)->with('error', 'Dữ liệu cập nhật bị lỗi');
    }

    public function indexDataVideo(Request $request)
    {
        $limit = 10;
        $data = MovieVideo::orderBy('position', 'desc');
        if (!empty($request->movie_id)) {
            $data = $data->where('movie_id', $request->movie_id);
        }
        $data = $data->limit($limit);
        return Datatables::of($data)
            ->addColumn('image', function($item) {
                $html = '';
                if (!empty($item->image)) {
                    $html = '<img src="'.url('/storage/'.$item->image).'" width="200"/>';
                }
                return $html;
            })
            ->addColumn('action', function ($item) {
                return '<a href="'.route('admin.movies.editVideo', $item->id).'" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i> Edit</a>
                <form action="'.route('admin.movies.deleteVideo', $item->id).'" method="POST" style="display:inline-block;">
                    <input type="hidden" name="_method" value="delete"/>
                    '.csrf_field().'
                    <input type="submit" class="btn btn-xs btn-danger" onclick="return window.confirm(\'Bạn muốn xóa item này không?\')" value="Delete"/>
                </form>
                ';
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }

    public function deleteVideo($id)
    {
        $video = MovieVideo::find($id);
        $video->delete();
        return redirect()->route('admin.movies.edit', $video->movie_id)->with('success', 'Dữ liệu đã được xóa thành công');
    }
}
