<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ContactController extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Contact();
    }

    public function index()
    {
        return view('admin.contact.index');
    }

    public function indexData()
    {
        $limit = 10;
        $data = $this->model->orderBy('id', 'desc')->limit($limit);
        return Datatables::of($data)
            ->addColumn('created_at', function ($item) {
                return date('Y-m-d H:i:s', strtotime($item->created_at));
            })
            ->addColumn('action', function ($item) {
                return '<a href="mailto:'.$item->email.'" class="btn btn-xs btn-success">Send mail</a><br/><form action="'.route('admin.contact.delete', $item->id).'" method="POST" style="display:inline-block;">
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
        return redirect()->route('admin.contact.index')->with('success', 'Dữ liệu đã được xóa thành công');
    }
}
