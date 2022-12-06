<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StaticPage;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new StaticPage();
    }

    public function index(Request $request)
    {
        $name = !empty($request->name) ? $request->name : '';
        $item = StaticPage::where('name', $name)->first();
        $staticPages = StaticPage::$pages;
        $pageTitle = !empty($staticPages[$name]) ? __($staticPages[$name]) : '';
        return view('admin.static_page.index', compact(
            'name',
            'item',
            'pageTitle'
        ));
    }

    public function save(Request $request)
    {
        $params = $request->all();
        $name = !empty($params['name']) ? $params['name'] : '';
        $content = !empty($params['content']) ? editorUploadImages($params['content']) : '';
        $this->model->updateOrCreate([
            'name' => $name
        ], [
            'name' => $name,
            'content' => $content
        ]);
        return redirect()->route('admin.static_page.index', ['name' => $name])->with('success', 'Dữ liệu đã được cập nhật thành công');
    }
}
