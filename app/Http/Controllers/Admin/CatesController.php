<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Cate;
use Yajra\Datatables\Datatables;

class CatesController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Cate();
        $routeName = explode('.', Route::currentRouteName());
        $pageTitle = ucfirst($routeName[1]).' '.ucfirst($routeName[2]);
        view()->share('pageTitle', $pageTitle);
    }

    public function index()
    {
        return view('admin.cates.index');
    }

    public function indexData()
    {
        $limit = 10;
        $data = $this->model->limit($limit);
        return Datatables::of($data)
            ->addColumn('action', function ($item) {
                return '<a href="'.route('admin.cates.edit', $item->id).'" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i> Edit</a>
                <form action="'.route('admin.cates.delete', $item->id).'" method="POST">
                    <input type="hidden" name="_method" value="delete"/>
                    '.csrf_field().'
                    <input type="submit" class="btn btn-xs btn-danger" onclick="return window.confirm(\'Bạn muốn xóa item này không?\')" value="Delete"/>
                </form>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function add()
    {
        return view('admin.cates.add');
    }

    public function edit($id)
    {
        $item = $this->model->find($id);
        return view('admin.cates.edit', compact('item'));
    }

    public function save(Request $request)
    {
        $nameValidate = 'required|unique:cates|max:255';
        if (!empty($request->id)) {
            $nameValidate = 'required|unique:cates,name,'.$request->id.'|max:255';
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
        $item->slug = $this->createSlug($request->name);
        $item->parent_id = !empty($request->parent_id) ? $request->parent_id : 0;
        $item->position = !empty($request->position) ? $request->position : 0;
        $item->save();
        return redirect()->route('admin.cates.index')->with('success', 'Dữ liệu đã được cập nhật thành công');
    }

    public function delete($id)
    {
        $this->model->find($id)->delete();
        return redirect()->route('admin.cates.index')->with('success', 'Dữ liệu đã được xóa thành công');
    }

    public function createSlug($str, $delimiter = '-'){
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    }
}
