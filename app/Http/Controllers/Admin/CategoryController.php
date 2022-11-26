<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        return view('admin.category.index');
    }

    public function add()
    {
        return view('admin.category.add_update');
    }

    public function save(Request $request)
    {
        $nameValidate = 'required|unique:categories|max:255';
        if (!empty($request->id)) {
            $nameValidate = 'required|unique:categories,name,'.$request->id.'|max:255';
        }
        $request->validate([
            'name' => $nameValidate
        ]);

        if (!empty($request->id)) {
            $item = $this->model->find($request->id);
        } else {
            $item = $this->model;
        }
        $item->name = $request->name;
        $item->slug = createSlug($request->name);
        if ($item->save()) {
            return redirect()->route('admin.category.index')->with('success', 'Dữ liệu đã được cập nhật thành công');
        }
        return redirect()->route('admin.category.index')->with('error', 'Dữ liệu cập nhật bị lỗi');
    }

    public function indexData()
    {
        $limit = 10;
        $data = $this->model->limit($limit);
        return Datatables::of($data)
            ->addColumn('created_at', function ($item) {
                return date('Y-m-d H:i:s', strtotime($item->created_at));
            })
            ->addColumn('action', function ($item) {
                return '<form action="'.route('admin.category.delete', $item->id).'" method="POST" style="display:inline-block;">
                <input type="hidden" name="_method" value="delete"/>
                '.csrf_field().'
                <input type="submit" class="btn btn-xs btn-danger" onclick="return window.confirm(\'Bạn muốn xóa item này không?\')" value="Delete"/>
            </form>';
            })
            ->make(true);
    }

    public function delete($id)
    {
        $this->model->find($id)->delete();
        return redirect()->route('admin.category.index')->with('success', 'Dữ liệu đã được xóa thành công');
    }
}
