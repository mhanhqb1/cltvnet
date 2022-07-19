<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cate;
use App\Models\Movie;
use App\Models\MovieCate;
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
        $limit = 10;
        $data = $this->model->limit($limit);
        return Datatables::of($data)
            ->addColumn('image', function($item) {
                $html = '';
                if (!empty($item->image)) {
                    $html = '<img src="'.url('/storage/'.$item->image).'" width="200"/>';
                }
                return $html;
            })
            ->addColumn('action', function ($item) {
                return '<a href="'.route('admin.movies.edit', $item->id).'" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i> Edit</a>
                <form action="'.route('admin.movies.delete', $item->id).'" method="POST">
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
        return view('admin.movies.add', compact('cates'));
    }

    public function edit($id)
    {
        $item = $this->model->find($id);
        $cates = Cate::get();
        $movieCates = MovieCate::where('movie_id', $id)->pluck('cate_id')->toArray();
        return view('admin.movies.edit', compact('item', 'cates', 'movieCates'));
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
            'image' => 'nullable|image'
        ]);
        if (!empty($request->image)) {
            $image = $request->file('image')->storePublicly('movies', 'public');
        } elseif (!empty($request->image_url)) {
            $image = $request->image_url;
        }
        if (!empty($request->id)) {
            $item = $this->model->find($request->id);
        } else {
            $item = $this->model;
        }
        $item->name = $request->name;
        $item->slug = $this->createSlug($request->name);
        $item->description = !empty($request->description) ? $request->description : '';
        $item->detail = !empty($request->detail) ? $request->detail : '';
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

    public function createSlug($str, $delimiter = '-'){
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    }
}
