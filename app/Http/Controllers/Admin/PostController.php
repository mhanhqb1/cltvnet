<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PostStatus;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostCate;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class PostController extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Post();
    }

    public function index()
    {
        $postType = Post::$postTypes['post'];
        return view('admin.post.index', compact(
            'postType'
        ));
    }

    public function productIndex()
    {
        $postType = Post::$postTypes['product'];
        return view('admin.post.index', compact(
            'postType'
        ));
    }

    public function update($id)
    {
        $postType = Post::$postTypes['post'];
        $item = $this->model->find($id);
        $cates = Category::get();
        $postStatus = PostStatus::getInstances();
        $postCates = PostCate::where('post_id', $id)->pluck('cate_id')->toArray();
        return view('admin.post.add_update', compact(
            'item',
            'cates',
            'postStatus',
            'postCates',
            'postType'
        ));
    }

    public function productUpdate($id)
    {
        $postType = Post::$postTypes['product'];
        $item = $this->model->find($id);
        $cates = Category::get();
        $postStatus = PostStatus::getInstances();
        $postCates = PostCate::where('post_id', $id)->pluck('cate_id')->toArray();
        return view('admin.post.add_update', compact(
            'item',
            'cates',
            'postStatus',
            'postCates',
            'postType'
        ));
    }

    public function add()
    {
        $postType = Post::$postTypes['product'];
        $cates = Category::get();
        $postStatus = PostStatus::getInstances();
        return view('admin.post.add_update', compact(
            'cates',
            'postStatus',
            'postType'
        ));
    }

    public function productAdd()
    {
        $postType = Post::$postTypes['product'];
        $cates = Category::get();
        $postStatus = PostStatus::getInstances();
        return view('admin.post.add_update', compact(
            'cates',
            'postStatus',
            'postType'
        ));
    }

    public function save(Request $request)
    {
        $nameValidate = 'required|unique:posts|max:255';
        if (!empty($request->id)) {
            $nameValidate = 'required|unique:posts,name,' . $request->id . '|max:255';
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
        $item->slug = $slug;
        $item->description = $request->description;
        $item->detail = editorUploadImages($request->detail);
        $item->meta_keyword = $request->seo_keywords;
        $item->status = $request->status;
        $item->type = isset($request->type) ? $request->type : 0;
        if (!empty($image)) {
            $item->image = $image;
        }
        $listUrl = 'admin.post.index';
        if (!empty($item->type)) {
            $listUrl = 'admin.product.index';
        }
        if ($item->save()) {
            PostCate::where('post_id', $item->id)->forceDelete();
            if (!empty($request->cates)) {
                foreach ($request->cates as $cate) {
                    PostCate::create([
                        'cate_id' => $cate,
                        'post_id' => $item->id
                    ]);
                }
            }
            return redirect()->route($listUrl)->with('success', 'Dữ liệu đã được cập nhật thành công');
        }
        return redirect()->route($listUrl)->with('error', 'Dữ liệu cập nhật bị lỗi');
    }

    public function indexData(Request $request)
    {
        $limit = 10;
        $postType = !empty($request->type) ? $request->type : 0;
        $data = $this->model->where('type', $postType)->limit($limit);
        return Datatables::of($data)
            ->addColumn('image', function ($item) {
                $html = '';
                if (!empty($item->image)) {
                    $html = '<img src="' . getImageUrl($item->image) . '" width="120"/>';
                }
                return $html;
            })
            ->addColumn('status', function ($item) {
                $_className = 'btn-success';
                if ($item->status == PostStatus::Hide) {
                    $_className = 'btn-danger';
                }
                return "<span class='btn btn-xs " . $_className . "'>" . __(PostStatus::getKey($item->status)) . "</span>";
            })
            ->addColumn('created_at', function ($item) {
                return date('Y-m-d H:i:s', strtotime($item->created_at));
            })
            ->addColumn('action', function ($item) {
                $updateUrl = 'admin.post.update';
                if (!empty($item->type)) {
                    $updateUrl = 'admin.product.update';
                }
                return '<a href="' . route($updateUrl, $item->id) . '" class="btn btn-xs btn-info">' . __('Update') . '</a> <form action="' . route('admin.post.delete', $item->id) . '" method="POST" style="display:inline-block;">
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
        $listUrl = 'admin.post.index';
        $item = $this->model->find($id);
        if (!empty($item->type)) {
            $listUrl = 'admin.product.index';
        }
        $item->delete();
        return redirect()->route($listUrl)->with('success', 'Dữ liệu đã được xóa thành công');
    }
}
