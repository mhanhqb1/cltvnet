@extends('layouts.admin_master')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
<form action="{{ route('admin.movies.saveVideo') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $item->id }}"/>
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
                        <label>Tên phim</label>
                        <select class="form-control" name="movie_id" data-placeholder="Chọn phim" style="width: 100%;">
                            @if (!empty($movies))
                            @foreach ($movies as $movie)
                            <option value="{{ $movie->id }}"
                            @if ($movie->id == $item->movie_id)
                            selected='selected'
                            @endif
                            >{{ $movie->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Tên</label>
                        <input type="text" id="inputName" name="name" class="form-control" value="{{ old('name') ? old('name') : $item->name }}">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Mô tả</label>
                        <textarea id="inputDescription" class="form-control" name="description" rows="4">{{ old('description') ? old('description') : $item->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputSourceUrls">Link videos (type::id, youtube::abcd)</label>
                        <textarea id="inputSourceUrls" class="form-control" name="source_urls" rows="4">{{ old('source_urls') ? old('source_urls') : $item->source_urls }}</textarea>
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
                        <input type="text" id="inputImageUrl" class="form-control" name="image_url" value="{{ old('image_url') ? old('image_url') : $item->image }}">
                    </div>
                    <div class="form-group">
                        <label for="inputDuration">Thời gian</label>
                        <input type="text" id="inputDuration" name="duration" class="form-control" value="{{ old('duration') ? old('duration') : $item->duration }}">
                    </div>
                    <div class="form-group">
                        <label for="inputPosition">Vị trí</label>
                        <input type="text" id="inputPosition" name="position" class="form-control" value="{{ old('position') ? old('position') : $item->position }}">
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
                        <textarea id="inputDetail" class="form-control textEditor" rows="20" name="detail">{{ old('detail') ? old('detail') : $item->detail }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.movies.edit', $item->movie_id) }}" class="btn btn-secondary">Hủy bỏ</a>
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
        $('.select2').select2();
    });
</script>
@endpush
