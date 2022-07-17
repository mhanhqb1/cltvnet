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
            ->addColumn('action', function ($item) {
                return '<a href="#edit-'.$item->id.'" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i> Edit</a>';
            })
            ->make(true);
    }

    public function add()
    {
        return view('admin.movies.add');
    }

    public function save(Request $request)
    {
        $image = '';
        $request->validate([
            'name' => 'required|unique:movies|max:255'
        ]);
        if (!empty($request->image)) {
            $image = $request->file('image')->storePublicly('movies', 'public');
        }
        $item = $this->model;
        $item->name = $request->name;
        $item->slug = $this->createSlug($request->name);
        $item->description = !empty($request->description) ? $request->description : '';
        $item->detail = !empty($request->detail) ? $request->detail : '';
        if (!empty($image)) {
            $item->image = $image;
        }
        $item->save();
        return redirect()->route('admin.movies.index');
    }

    public function createSlug($str, $delimiter = '-'){
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    }
}
