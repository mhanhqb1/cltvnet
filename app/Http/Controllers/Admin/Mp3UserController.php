<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Mp3User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class Mp3UserController extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Mp3User();
    }

    public function index()
    {
        return view('admin.mp3_user.index');
    }

    public function add()
    {
        return view('admin.mp3_user.add_update');
    }

    public function update($id)
    {
        $item = $this->model->find($id);
        return view('admin.mp3_user.add_update', compact('item'));
    }

    public function save(Request $request)
    {
        $nameValidate = 'required|unique:mp3_users|max:255';
        if (!empty($request->id)) {
            $nameValidate = 'required|unique:albums,mp3_user_name,'.$request->id.'|max:255';
        }
        $request->validate([
            'mp3_user_name' => $nameValidate
        ], [
            'mp3_user_name.unique' => 'Tên đã được sử dụng'
        ]);

        if (!empty($request->id)) {
            $item = $this->model->find($request->id);
        } else {
            $item = $this->model;
        }
        $item->name = $request->name;
        $item->mp3_user_name = $request->mp3_user_name;
        $item->mp3_cookie = $request->mp3_cookie;
        if ($item->save()) {
            return redirect()->route('admin.mp3_user.index')->with('success', 'Dữ liệu đã được cập nhật thành công');
        }
        return redirect()->route('admin.mp3_user.index')->with('error', 'Dữ liệu cập nhật bị lỗi');
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
                return '<a href="'.route('admin.mp3_user.update', $item->id).'" class="btn btn-xs btn-info">'.__('Update').'</a> <form action="'.route('admin.mp3_user.delete', $item->id).'" method="POST" style="display:inline-block;">
                <input type="hidden" name="_method" value="delete"/>
                '.csrf_field().'
                <input type="submit" class="btn btn-xs btn-danger" onclick="return window.confirm(\'Bạn muốn xóa item này không?\')" value="'.__('Delete').'"/>
            </form>';
            })
            ->make(true);
    }

    public function delete($id)
    {
        $this->model->find($id)->delete();
        return redirect()->route('admin.mp3_user.index')->with('success', 'Dữ liệu đã được xóa thành công');
    }
}
