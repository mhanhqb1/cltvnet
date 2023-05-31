@extends('layouts.admin_master')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
<form action="{{ route('admin.movies.save') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Thông tin chung</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputName">Tên</label>
                        <input type="text" id="inputName" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select class="select2" name="cates[]" multiple="multiple" data-placeholder="Chọn danh mục" style="width: 100%;">
                            @if (!empty($cates))
                            @foreach ($cates as $cate)
                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Quốc gia</label>
                        <select class="select2" name="country_id" data-placeholder="Chọn quốc gia" style="width: 100%;">
                            <option value="0">----</option>
                            @if (!empty($countries))
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Mô tả</label>
                        <textarea id="inputDescription" class="form-control" name="description" rows="4">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputTags">Tags</label>
                        <textarea id="inputTags" class="form-control" name="tags" rows="4">{{ old('tags') }}</textarea>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-md-6">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Thông tin khác</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputImage">Upload ảnh</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputImage" name="image">
                                <label class="custom-file-label" for="inputImage">Chọn file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputImageUrl">Link ảnh</label>
                        <input type="text" id="inputImageUrl" class="form-control" name="image_url" value="{{ old('image_url') }}">
                    </div>
                    <div class="form-group">
                        <label>Thể loại</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="radio1" name="is_series" value="0">
                            <label class="form-check-label" for="radio1">Phim lẻ</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="radio2" name="is_series" value="1">
                            <label class="form-check-label" for="radio2">Phim bộ</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputYear">Năm sản xuất</label>
                        <input type="text" id="inputYear" class="form-control" name="year" value="{{ old('year') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputDailyVideoId">Dailymotion Video ID</label>
                        <input type="text" id="inputDailyVideoId" class="form-control" name="daily_video_id" value="{{ old('daily_video_id') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputDailyPlaylistId">Dailymotion Playlist ID</label>
                        <input type="text" id="inputDailyPlaylistId" class="form-control" name="daily_playlist_id" value="{{ old('daily_playlist_id') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputOkRuId">Ok.ru ID</label>
                        <input type="text" id="inputOkRuId" class="form-control" name="ok_ru_id" value="{{ old('ok_ru_id') }}">
                    </div>
                    <div class="form-group">
                        <label for="ultra_keyword">Ultra Keyword</label>
                        <input type="text" id="ultra_keyword" class="form-control" name="ultra_keyword" value="{{ old('ultra_keyword') }}">
                    </div>
                    <div class="form-group">
                        <label for="tusnovelas">Tusnovelas</label>
                        <input type="text" id="tusnovelas" class="form-control" name="tusnovelas" value="{{ old('tusnovelas') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Thông tin chi tiết</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <textarea id="inputDetail" class="form-control textEditor" rows="20" name="detail">{{ old('detail') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary">Hủy bỏ</a>
            <input type="submit" value="Tạo mới" class="btn btn-success float-right">
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js" integrity="sha512-RtZU3AyMVArmHLiW0suEZ9McadTdegwbgtiQl5Qqo9kunkVg1ofwueXD8/8wv3Af8jkME3DDe3yLfR8HSJfT2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js" integrity="sha512-ZESy0bnJYbtgTNGlAD+C2hIZCt4jKGF41T5jZnIXy4oP8CQqcrBGWyxNP16z70z/5Xy6TS/nUZ026WmvOcjNIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('.textEditor').summernote();
        $('.select2').select2()
    });
</script>
@endpush
