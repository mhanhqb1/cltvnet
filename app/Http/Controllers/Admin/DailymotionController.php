<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Dailymotion;
use Yajra\Datatables\Datatables;

class DailymotionController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Dailymotion();
        $routeName = explode('.', Route::currentRouteName());
        $pageTitle = ucfirst($routeName[1]).' '.ucfirst($routeName[2]);
        view()->share('pageTitle', $pageTitle);
        view()->share('dailyTypes', Dailymotion::$dailymotionTypes);
    }

    public function index()
    {
        return view('admin.dailymotion.index');
    }

    public function indexData()
    {
        $limit = 10;
        $data = $this->model->limit($limit);
        return Datatables::of($data)
            ->addColumn('action', function ($item) {
                return '<a href="'.route('admin.dailymotion.edit', $item->id).'" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i> Edit</a>
                <form action="'.route('admin.dailymotion.delete', $item->id).'" method="POST">
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
        return view('admin.dailymotion.add');
    }

    public function edit($id)
    {
        $item = $this->model->find($id);
        return view('admin.dailymotion.edit', compact('item'));
    }

    public function save(Request $request)
    {
        $nameValidate = 'required|unique:dailymotions|max:255';
        if (!empty($request->id)) {
            $nameValidate = 'required|unique:dailymotions,source_id,'.$request->id.'|max:255';
        }
        $request->validate([
            'source_id' => $nameValidate
        ]);
        if (!empty($request->id)) {
            $item = $this->model->find($request->id);
        } else {
            $item = $this->model;
        }
        $item->name = $request->name;
        $item->source_id = $request->source_id;
        $item->type = !empty($request->type) ? $request->type : 0;
        $item->save();
        return redirect()->route('admin.dailymotion.index')->with('success', 'Dữ liệu đã được cập nhật thành công');
    }

    public function delete($id)
    {
        $this->model->find($id)->delete();
        return redirect()->route('admin.dailymotion.index')->with('success', 'Dữ liệu đã được xóa thành công');
    }
}
