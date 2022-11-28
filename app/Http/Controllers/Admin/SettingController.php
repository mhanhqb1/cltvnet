<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

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
}
