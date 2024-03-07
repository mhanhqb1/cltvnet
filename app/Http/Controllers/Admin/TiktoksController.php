<?php

namespace App\Http\Controllers\Admin;

use App\Common\Definition\TiktokType;
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
        $types = TiktokType::i18n();
        return view('admin.tiktoks.index', compact(
            'types'
        ));
    }

    public function add()
    {
        $types = TiktokType::i18n();
        return view('admin.tiktoks.add_update', compact(
            'types'
        ));
    }

    public function update($id)
    {
        $item = TiktokServices::get_one([
            'id' => $id,
        ]);
        $types = TiktokType::i18n();
        return view('admin.tiktoks.add_update', compact(
            'item',
            'types'
        ));
    }

    public function indexData(Request $request)
    {
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
                return '<a href="' . route('admin.tiktoks.update', $item->id) . '" class="btn btn-xs btn-info">' . __('Update') . '</a> <form action="' . route('admin.tiktoks.delete', $item->id) . '" method="POST" style="display:inline-block;">
                    <input type="hidden" name="_method" value="delete"/>
                    ' . csrf_field() . '
                    <input type="submit" class="btn btn-xs btn-danger" onclick="return window.confirm(\'Bạn muốn xóa item này không?\')" value="' . __('Delete') . '"/>
                </form>';
            })
            ->rawColumns(['status', 'action', 'image'])
            ->make(true);
    }

    public function save(Request $request)
    {
        if (TiktokServices::add_update($request)) {
            return redirect()->route('admin.tiktoks.index')->with('success', 'Dữ liệu đã được cập nhật thành công');
        }
        return redirect()->route('admin.tiktoks.index')->with('error', 'Dữ liệu cập nhật bị lỗi');
    }

    public function delete($id)
    {
        TiktokServices::delete([
            'id' => $id,
        ]);
        return redirect()->route('admin.tiktoks.index')->with('success', 'Dữ liệu đã được xóa thành công');
    }
}
