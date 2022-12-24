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
        $settings = $this->model::$settings;
        foreach ($settings as $k => $v) {
            if ($v['type'] == 'file' && !empty($request->$k)) {
                $this->model->updateOrCreate([
                    'name' => $k
                ], [
                    'name' => $k,
                    'value' => $request->file($k)->storePubliclyAs('settings', $k . '-' . time() . '.webp', 'public')
                ]);
            } else {
                if (isset($request->$k)) {
                    $this->model->updateOrCreate([
                        'name' => $k
                    ], [
                        'name' => $k,
                        'value' => $request->$k
                    ]);
                }
            }
        }
        return redirect()->route('admin.setting.index')->with('success', 'Dữ liệu đã được cập nhật thành công');
    }
}
