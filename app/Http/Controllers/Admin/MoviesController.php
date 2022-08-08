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
            ->addColumn('action', function ($item) {
                return '<a href="'.route('admin.movies.edit', $item->id).'" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i> Edit</a>
                <a href="'.route('admin.movies.addVideo', ['movie_id' => $item->id]).'" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Add video</a>
                <form action="'.route('admin.movies.delete', $item->id).'" method="POST" style="display:inline-block;">
                    <input type="hidden" name="_method" value="delete"/>
                    '.csrf_field().'
                    <input type="submit" class="btn btn-xs btn-danger" onclick="return window.confirm(\'Bạn muốn xóa item này không?\')" value="Delete"/>
                </form>
                ';
            })
            ->rawColumns(['image', 'action'])
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
        return view('admin.movies.edit', compact('item', 'cates', 'movieCates', 'countries'));
    }

    public function save(Request $request)
    {
        $image = '';
        $nameValidate = 'required|unique:movies|max:255';
        if (!empty($request->id)) {
            $nameValidate = 'required|unique:movies,name,'.$request->id.'|max:255';
        }
        $request->validate([
            'name' => $nameValidate,
            'image' => 'nullable|image|max:1024'
        ]);
        $slug = createSlug($request->name);
        if (!empty($request->image)) {
            $image = $request->file('image')->storePubliclyAs('phim', $slug.'-'.time().'.jpg', 'public');
        } elseif (!empty($request->image_url)) {
            $image = $request->image_url;
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
            return redirect()->route('admin.movies.index')->with('success', 'Dữ liệu đã được cập nhật thành công');
        }
        return redirect()->route('admin.movies.index')->with('error', 'Dữ liệu cập nhật bị lỗi');
    }

    public function delete($id)
    {
        $this->model->find($id)->delete();
        return redirect()->route('admin.movies.index')->with('success', 'Dữ liệu đã được xóa thành công');
    }

    public function addVideo()
    {
        $movies = Movie::get();
        return view('admin.movies.add_video', compact('movies'));
    }

    public function editVideo($id)
    {
        $item = MovieVideo::find($id);
        $movies = Movie::get();
        return view('admin.movies.edit_video', compact('item', 'movies'));
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
