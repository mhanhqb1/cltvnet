<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PostStatus;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
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
        $item = $this->model->find($id);
        $cates = Category::get();
        return view('admin.post.add_update', compact('item', 'cates'));
    }

    public function add()
    {
        $cates = Category::get();
        return view('admin.post.add_update', compact('cates'));
    }

    public function save(Request $request)
    {
        $nameValidate = 'required|unique:posts|max:255';
        if (!empty($request->id)) {
            $nameValidate = 'required|unique:posts,name,'.$request->id.'|max:255';
        }
        $request->validate([
            'name' => $nameValidate,
            'image' => 'nullable|image|max:1024'
        ], [
            'name.unique' => 'Tên đã được sử dụng'
        ]);

        if (!empty($request->id)) {
            $item = $this->model->find($request->id);
        } else {
            $item = $this->model;
        }
        $item->name = $request->name;
        $item->slug = createSlug($request->name);
        $item->detail = editorUploadImages($request->detail);
        if ($item->save()) {
            return redirect()->route('admin.post.index')->with('success', 'Dữ liệu đã được cập nhật thành công');
        }
        return redirect()->route('admin.post.index')->with('error', 'Dữ liệu cập nhật bị lỗi');
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
