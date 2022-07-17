<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class MoviesController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Movie();
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
                return '<a href="'.route('admin.movies.edit', $item->id).'" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i> Edit</a>';
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }

    public function add()
    {
        return view('admin.movies.add');
    }

    public function edit($id)
    {
        $item = $this->model->find($id);
        return view('admin.movies.edit', compact('item'));
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
        $item->save();
        return redirect()->route('admin.movies.index')->with('success', 'Dữ liệu đã được cập nhật thành công');
    }

    public function createSlug($str, $delimiter = '-'){
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    }
}
