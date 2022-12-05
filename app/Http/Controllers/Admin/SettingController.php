<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeFeedback;
use App\Models\Setting;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class SettingController extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Setting();
    }

    public function index()
    {
        $settings = $this->model::$settings;
        return view('admin.setting.index', compact('settings'));
    }

    public function save(Request $request)
    {
        $params = $request->all();
        foreach ($params as $k => $v) {
            if ($k != '_token') {
                $this->model->updateOrCreate([
                    'name' => $k
                ], [
                    'name' => $k,
                    'value' => $v
                ]);
            }
        }
        return redirect()->route('admin.setting.index')->with('success', 'Dữ liệu đã được cập nhật thành công');
    }

    public function homeFeedbackIndex()
    {
        return view('admin.homepage.feedback');
    }
    public function homeFeedbackIndexData(Request $request)
    {
        $limit = 10;
        $data = HomeFeedback::limit($limit);
        return Datatables::of($data)
            ->addColumn('created_at', function ($item) {
                return date('Y-m-d H:i:s', strtotime($item->created_at));
            })
            ->addColumn('image', function ($item) {
                $html = '';
                if (!empty($item->image)) {
                    $html = '<img src="' . getImageUrl($item->image) . '" width="120"/>';
                }
                return $html;
            })
            ->addColumn('action', function ($item) {
                $updateUrl = 'admin.setting.home_feedback_update';
                return '<a href="'.route($updateUrl, $item->id).'" class="btn btn-xs btn-info">'.__('Update').'</a> <form action="'.route('admin.setting.home_feedback_delete', $item->id).'" method="POST" style="display:inline-block;">
                <input type="hidden" name="_method" value="delete"/>
                '.csrf_field().'
                <input type="submit" class="btn btn-xs btn-danger" onclick="return window.confirm(\'Bạn muốn xóa item này không?\')" value="'.__('Delete').'"/>
            </form>';
            })
            ->rawColumns(['status', 'action', 'image'])
            ->make(true);
    }
    public function homeFeedbackAdd()
    {
        return view('admin.homepage.feedback_add_update');
    }
    public function homeFeedbackUpdate($id)
    {
        $item = HomeFeedback::find($id);
        return view('admin.homepage.feedback_add_update', compact('item'));
    }
    public function homeFeedbackDelete($id)
    {
        $listUrl = 'admin.setting.home_feedback_index';
        HomeFeedback::find($id)->delete();
        return redirect()->route($listUrl)->with('success', 'Dữ liệu đã được xóa thành công');
    }
    public function homeFeedbackSave(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'nullable|image|max:1024',
            'job' => 'required|max:255',
            'message' => 'required|max:255',
        ], [
            'name.required' => 'Vui lòng nhập tên',
            'image.required' => 'Vui lòng chọn hình ảnh',
            'job.required' => 'Vui lòng nhập công việc',
            'message.required' => 'Vui lòng nhập message',
        ]);
        if (!empty($request->image)) {
            $image = $request->file('image')->storePubliclyAs('images', 'home-feedback-' . time() . '.jpg', 'public');
        } elseif (!empty($request->image_url)) {
            $image = $request->image_url;
        }

        if (!empty($request->id)) {
            $item = HomeFeedback::find($request->id);
        } else {
            $item = new HomeFeedback();
        }
        $item->name = $request->name;
        $item->message = $request->message;
        $item->job = $request->job;
        if (!empty($image)) {
            $item->image = $image;
        }
        $listUrl = 'admin.setting.home_feedback_index';
        if ($item->save()) {
            return redirect()->route($listUrl)->with('success', 'Dữ liệu đã được cập nhật thành công');
        }
        return redirect()->route($listUrl)->with('error', 'Dữ liệu cập nhật bị lỗi');
    }
}
