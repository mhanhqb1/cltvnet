<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Category;
use App\Models\Mp3User;
use App\Models\Music;
use App\Models\MusicCate;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class MusicController extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Music();
    }

    public function index()
    {
        $cates = Category::get();
        $albums = Album::get();
        $mp3Users = Mp3User::get();
        return view('admin.music.index', compact(
            'cates',
            'albums',
            'mp3Users'
        ));
    }

    public function update($id)
    {
        $item = $this->model->find($id);
        $cates = Category::get();
        $albums = Album::get();
        $mp3Users = Mp3User::get();
        $itemCates = MusicCate::where('music_id', $id)->pluck('cate_id')->toArray();
        return view('admin.music.add_update', compact(
            'item',
            'cates',
            'itemCates',
            'albums',
            'mp3Users'
        ));
    }

    public function add()
    {
        $cates = Category::get();
        $albums = Album::get();
        $mp3Users = Mp3User::get();
        return view('admin.music.add_update', compact(
            'cates',
            'albums',
            'mp3Users'
        ));
    }

    public function save(Request $request)
    {
        $nameValidate = 'required|unique:music|max:255';
        if (!empty($request->id)) {
            $nameValidate = 'required|unique:music,name,' . $request->id . '|max:255';
        }
        $request->validate([
            'name' => $nameValidate,
            'image' => 'nullable|image|max:1024'
        ], [
            'name.unique' => 'Tên đã được sử dụng'
        ]);
        $slug = createSlug($request->name);
        if (!empty($request->image)) {
            $image = $request->file('image')->storePubliclyAs('images', $slug . '-' . time() . '.jpg', 'public');
        } elseif (!empty($request->image_url)) {
            $image = $request->image_url;
        }

        if (!empty($request->id)) {
            $item = $this->model->find($request->id);
        } else {
            $item = $this->model;
        }
        $item->name = $request->name;
        // $item->slug = $slug;
        $item->album_id = !empty($request->album_id) ? $request->album_id : 0;
        // $item->duration = $request->duration;
        $item->mp3_user_id = $request->mp3_user_id;
        $item->mp3_id = $request->mp3_id;
        if (!empty($image)) {
            $item->image = $image;
        }
        if ($item->save()) {
            MusicCate::where('music_id', $item->id)->forceDelete();
            if (!empty($request->cates)) {
                foreach ($request->cates as $cate) {
                    MusicCate::create([
                        'cate_id' => $cate,
                        'music_id' => $item->id
                    ]);
                }
            }
            return redirect()->route('admin.music.index')->with('success', 'Dữ liệu đã được cập nhật thành công');
        }
        return redirect()->route('admin.music.index')->with('error', 'Dữ liệu cập nhật bị lỗi');
    }

    public function indexData(Request $request)
    {
        $limit = 10;
        $data = $this->model->limit($limit);
        if (!empty($request->name)) {
            $data = $data->where('name', 'like', '%'.$request->name.'%');
        }
        if (!empty($request->cate_id)) {
            $data = $data->with('cates')->whereHas('cates', function ($q) use($request){
                $q->where('categories.id', $request->cate_id);
            });
        }
        return Datatables::of($data)
            ->addColumn('image', function ($item) {
                $html = '';
                if (!empty($item->image)) {
                    $html = '<img src="' . getImageUrl($item->image) . '" width="120"/>';
                }
                return $html;
            })
            ->addColumn('created_at', function ($item) {
                return date('Y-m-d H:i:s', strtotime($item->created_at));
            })
            ->addColumn('action', function ($item) {
                return '<a href="' . route('admin.music.update', $item->id) . '" class="btn btn-xs btn-info">' . __('Update') . '</a> <form action="' . route('admin.music.delete', $item->id) . '" method="POST" style="display:inline-block;">
                <input type="hidden" name="_method" value="delete"/>
                ' . csrf_field() . '
                <input type="submit" class="btn btn-xs btn-danger" onclick="return window.confirm(\'Bạn muốn xóa item này không?\')" value="' . __('Delete') . '"/>
            </form>';
            })
            ->rawColumns(['status', 'action', 'image'])
            ->make(true);
    }

    public function delete($id)
    {
        $this->model->find($id)->delete();
        return redirect()->route('admin.music.index')->with('success', 'Dữ liệu đã được xóa thành công');
    }
}
