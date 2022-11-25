<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PostStatus;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class PostController extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Post();
    }

    public function index()
    {
        return view('admin.post.index');
    }

    public function update($id)
    {
        return view('admin.post.add_update');
    }

    public function adđ()
    {
        return view('admin.post.add_update');
    }

    public function indexData()
    {
        $limit = 10;
        $data = $this->model->limit($limit);
        return Datatables::of($data)
            ->addColumn('status', function ($item) {
                return PostStatus::getKey($item->status);
            })
            ->addColumn('action', function ($item) {
                return '<a href="'.route('admin.post.update', $item->id).'" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i> Edit</a>';
            })
            ->make(true);
    }
}
