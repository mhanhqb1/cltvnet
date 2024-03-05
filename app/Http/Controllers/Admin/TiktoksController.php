<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\TiktokServices;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class TiktoksController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('admin.tiktoks.index');
    }

    public function add()
    {
        return view('admin.tiktoks.add_update');
    }

    public function indexData(Request $request)
    {
        $limit = 10;
        $data = TiktokServices::get_list($request->all());
        return Datatables::of($data)
            ->addColumn('image', function ($item) {
                $html = '';
                if (!empty($item->image)) {
                    $html = '<img src="' . getImageUrl($item->image) . '" width="120"/>';
                }
                return $html;
            })
            ->addColumn('type', function ($item) {
                return $item->type->getName();
            })
            ->addColumn('created_at', function ($item) {
                return date('Y-m-d H:i:s', strtotime($item->created_at));
            })
            ->addColumn('action', function ($item) {
                return '<a href="' . route('admin.post.update', $item->id) . '" class="btn btn-xs btn-info">' . __('Update') . '</a> <form action="' . route('admin.post.delete', $item->id) . '" method="POST" style="display:inline-block;">
                    <input type="hidden" name="_method" value="delete"/>
                    ' . csrf_field() . '
                    <input type="submit" class="btn btn-xs btn-danger" onclick="return window.confirm(\'Bạn muốn xóa item này không?\')" value="' . __('Delete') . '"/>
                </form>';
            })
            ->rawColumns(['status', 'action', 'image'])
            ->make(true);
    }
}
