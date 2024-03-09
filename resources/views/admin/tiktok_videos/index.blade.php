@extends('layouts.admin_master')

@push('css')
<style>
    .form-inline .form-group {
        margin-right: 24px;
    }
    .form-inline .form-group label {
        margin-right: 12px;
    }
</style>
<script async src="https://www.tiktok.com/embed.js"></script>
@endpush

@section('content')
<div class="row" style="margin-bottom: 24px;">
    <div class="col-md-12">
        <a href="{{ route('admin.tiktoks.add') }}" class="btn btn-primary">{{ __('Add New') }}</a>
    </div>
</div>
<div class="row" style="margin-bottom: 24px;">
    <div class="col-md-12">
        <form action="" method="GET" class="form-inline">
            <div class="form-group form-inline">
                <label>{{ __('Name') }}</label>
                <input type="text" class="form-control" name="name" value="{{ !empty($_GET['name']) ? $_GET['name'] : '' }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="{{ __('Search') }}" />
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover" id="dataTable">
            <thead>
                <tr>
                    <td style="width: 20px;">#</td>
                    <td style="width: 130px;">{{ __('Image') }}</td>
                    <td>{{ __('Video') }}</td>
                    <td>{{ __('Unique ID') }}</td>
                    <td>{{ __('Description') }}</td>
                    <td style="width: 100px;">{{ __('Published At') }}</td>
                    <td style="width: 100px;">{{ __('Crawl At') }}</td>
                    <td style="width: 100px;"></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($videos as $k => $video)
                    <tr>
                        <td>{{ $k + 1 }}</td>
                        <td><img src="{{ $video->image }}" width="100"/></td>
                        <td>
                            @include('components.tiktok_video_embed', ['video' => $video])
                        </td>
                        <td>{{ $video->unique_id }}</td>
                        <td>{{ $video->description }}</td>
                        <td>{{ $video->publish_at }}</td>
                        <td>{{ $video->crawl_at }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $videos->links() }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
</script>
@endpush
