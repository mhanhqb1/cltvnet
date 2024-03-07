<?php

namespace App\Services;

use App\Common\Definition\PaginationDefs;
use App\Models\Tiktok;
use App\Services\AbstractService;
use Illuminate\Http\Request;

class TiktokServices extends AbstractService
{
    public function __construct() {
        parent::__construct();
    }

    public static function get_list(array $params = []) {
        $limit = $params['limit'] ?? PaginationDefs::LIMIT_DEFAULT;
        $data = Tiktok::limit($limit);
        if (isset($params['type']) && $params['type'] != '') {
            $data = $data->where('type', $params['type']);
        }
        if (!empty($params['name'])) {
            $data = $data->where('name', 'LIKE', '%'.$params['name'].'%');
        }
        $data = $data->orderBy('id', 'desc')
            ->get();
        return $data;
    }

    public static function get_one(array $params = []) {
        $data = Tiktok::where('id', $params['id'])->firstOrFail();
        return $data;
    }

    public static function add_update(Request $request) {
        $idValidate = 'required|unique:tiktoks|max:255';
        if (!empty($request->id)) {
            $idValidate = 'required|unique:tiktoks,unique_id,' . $request->id . '|max:255';
        }
        $request->validate([
            'unique_id' => $idValidate,
            'image' => 'nullable|image|max:1024'
        ], [
            'unique_id.unique' => 'Tiktok đã được sử dụng'
        ]);
        $slug = createSlug($request->unique_id);
        if (!empty($request->image)) {
            $image = $request->file('image')->storePubliclyAs('images', $slug . '-' . time() . '.jpg', 'public');
        } elseif (!empty($request->image_url)) {
            $image = $request->image_url;
        }

        if (!empty($request->id)) {
            $item = Tiktok::find($request->id);
        } else {
            $item = new Tiktok();
        }
        $item->unique_id = $request->unique_id;
        $item->note = $request->note;
        $item->type = $request->type;
        if (!empty($image)) {
            $item->image = $image;
        }
        if ($item->save()) {
            return true;
        }
        return false;
    }

    public static function delete(array $params = []) {
        $data = Tiktok::where('id', $params['id'])->delete();
        return $data;
    }
}
