<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class CategoryController extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Category();
    }

    public function index()
    {
        $postType = Post::$postTypes['post'];
        return view('admin.category.index', compact(
            'postType'
        ));
    }

    public function productIndex()
    {
        $postType = Post::$postTypes['product'];
        return view('admin.category.index', compact(
            'postType'
        ));
    }

    public function add()
    {
        $postType = Post::$postTypes['post'];
        return view('admin.category.add_update', compact(
            'postType'
        ));
    }

    public function productAdd()
    {
        $postType = Post::$postTypes['product'];
        return view('admin.category.add_update', compact(
            'postType'
        ));
    }

    public function update($id)
    {
        $postType = Post::$postTypes['post'];
        $item = $this->model->find($id);
        return view('admin.category.add_update', compact(
            'item',
            'postType'
        ));
    }

    public function productUpdate($id)
    {
        $postType = Post::$postTypes['product'];
        $item = $this->model->find($id);
        return view('admin.category.add_update', compact(
            'item',
            'postType'
        ));
    }

    public function save(Request $request)
    {
        $nameValidate = 'required|unique:categories|max:255';
        if (!empty($request->id)) {
            $nameValidate = 'required|unique:categories,name,'.$request->id.'|max:255';
        }
        $request->validate([
            'name' => $nameValidate
        ], [
            'name.unique' => 'Tên đã được sử dụng'
        ]);

        if (!empty($request->id)) {
            $item = $this->model->find($request->id);
        } else {
            $item = $this->model;
        }
        $item->name = $request->name;
        $item->type = !empty($request->type) ? $request->type : 0;
        $item->slug = createSlug($request->name);
        $listUrl = 'admin.category.index';
        if (!empty($item->type)) {
            $listUrl = 'admin.product_category.index';
        }
        if ($item->save()) {
            return redirect()->route($listUrl)->with('success', 'Dữ liệu đã được cập nhật thành công');
        }
        return redirect()->route($listUrl)->with('error', 'Dữ liệu cập nhật bị lỗi');
    }

    public function indexData(Request $request)
    {
        $limit = 10;
        $type = !empty($request->type) ? $request->type : 0;
        $data = $this->model->where('type', $type);
        if (!empty($request->name)) {
            $data = $data->where('name', 'like', '%'.$request->name.'%');
        }
        $data = $data->limit($limit);
        return Datatables::of($data)
            ->addColumn('created_at', function ($item) {
                return date('Y-m-d H:i:s', strtotime($item->created_at));
            })
            ->addColumn('action', function ($item) {
                $updateUrl = 'admin.category.update';
                if (!empty($item->type)) {
                    $updateUrl = 'admin.product_category.update';
                }
                return '<a href="'.route($updateUrl, $item->id).'" class="btn btn-xs btn-info">'.__('Update').'</a> <form action="'.route('admin.category.delete', $item->id).'" method="POST" style="display:inline-block;">
                <input type="hidden" name="_method" value="delete"/>
                '.csrf_field().'
                <input type="submit" class="btn btn-xs btn-danger" onclick="return window.confirm(\'Bạn muốn xóa item này không?\')" value="'.__('Delete').'"/>
            </form>';
            })
            ->make(true);
    }

    public function delete($id)
    {
        $item = $this->model->find($id);
        $listUrl = 'admin.category.index';
        if (!empty($item->type)) {
            $listUrl = 'admin.product_category.index';
        }
        $item->delete();
        return redirect()->route($listUrl)->with('success', 'Dữ liệu đã được xóa thành công');
    }
}
