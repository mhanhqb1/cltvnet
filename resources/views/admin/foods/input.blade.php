@extends('layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="text-black-50">{{ __('food_edit') }}</h1>
            </div>
        </div>
    </div>
</section>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
    <form action="{{ $food->food_id ? route('admin.foods.update', $food->food_id) : route('admin.foods.store') }}" id="registerForm" method="POST" enctype="multipart/form-data">
        @csrf
        @if($food->food_id)
            @method('PUT')
            <input type="hidden" name="food_id" value="{{ $food->food_id }}" />
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('general_info') }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($attrInputTypes as $attr => $inputType)
                        @php
                            $oldVal = old($attr, $food->$attr);
                            if (is_array($oldVal)) {
                                $oldVal = implode(',', $oldVal);
                            }
                        @endphp
                        <x-input-types
                            name="{{ $attr }}"
                            type="{{ $inputType }}"
                            label="{{ $attrNames[$attr] }}"
                            value="{{ $oldVal }}"
                            :options="!empty($options[$attr]) ? $options[$attr] : []"
                            :multi="!empty($multi[$attr]) ? $multi[$attr] : false"
                            ></x-input-types>
                        @if ($errors->has($attr))
                            <div class="text-danger">{{ $errors->first($attr) }}</div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-info" id="foodRecipeCard">
                    <input type="hidden" name="food_recipes" value="" id="inputFoodRecipes"/>
                    <div class="card-header">
                        <h3 class="card-title">{{ __('receipe_info') }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (old('food_recipes'))
                            @php
                                $oldFoodRecipes = json_decode(old('food_recipes'), true);
                            @endphp
                            @foreach($oldFoodRecipes as $k => $oldFoodRecipe)
                                @if ($errors->has('row') && $errors->first('row') == $k)
                                    @php
                                        $oldFoodRecipe['hasError'] = true;
                                    @endphp
                                @endif
                                @include('admin.foods.recipe-table', $oldFoodRecipe)
                            @endforeach
                        @elseif(!$food->recipes->isEmpty())
                            @foreach($food->recipes as $recipe)
                                @include('admin.foods.recipe-table', $recipe->getRecipeData())
                            @endforeach
                        @else
                            @include('admin.foods.recipe-table')
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="btn btn-info" id="addNewRecipe">{{ __('add_new') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary" id="foodVideoCard">
                    <input type="hidden" name="food_videos" value="" id="inputFoodVideos"/>
                    <div class="card-header">
                        <h3 class="card-title">{{ __('videos_info') }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (old('food_videos'))
                            @php
                                $oldFoodVideos = json_decode(old('food_videos'), true);
                            @endphp
                            @foreach($oldFoodVideos as $k => $oldFoodVideo)
                                @if ($errors->has('row') && $errors->first('row') == $k)
                                    @php
                                        $oldFoodVideo['hasError'] = true;
                                    @endphp
                                @endif
                                @include('admin.foods.video-table', $oldFoodVideo)
                            @endforeach
                        @elseif(!$food->videos->isEmpty())
                            @foreach($food->videos as $video)
                                @include('admin.foods.video-table', $video->getVideoData())
                            @endforeach
                        @else
                            @include('admin.foods.video-table')
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="btn btn-info" id="addNewVideo">{{ __('add_new') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-5">
                <a href="{{ route('admin.foods.index') }}" class="btn btn-secondary">{{ __('cancel') }}</a>
                <input type="submit" value="{{ __('save') }}" class="btn btn-primary float-right">
                @if ($food->food_id)
                    <button type="button" data-toggle="modal" data-target="#modalDelete" class="btn btn-danger mr-2 float-right">{{ __('delete') }}</button>
                @endif
            </div>
        </div>
    </form>
    </div>
</section>
@if ($food->food_id)
<x-delete-modal id="{{ $food->food_id }}" url="{{ route('admin.foods.destroy', $food->food_id) }}"></x-delete-modal>
@endif
<div id="recipeTableBlank" style="display: none;">
@include('admin.foods.recipe-table')
</div>
<div id="videoTableBlank" style="display: none;">
@include('admin.foods.video-table')
</div>
@endsection

@push('page_scripts')
<script>
    const inputFoodRecipes = $('#inputFoodRecipes');
    const recipeTableBlankHtml = $('#recipeTableBlank').html();
    const recipeContainer = $('#foodRecipeCard .card-body');
    const addNewRecipeBtn = $('#addNewRecipe');
    const inputFoodVideos = $('#inputFoodVideos');
    const videoTableBlankHtml = $('#videoTableBlank').html();
    const videoContainer = $('#foodVideoCard .card-body');
    const addNewVideoBtn = $('#addNewVideo');
    const registerForm = $('#registerForm');
    $(document).ready(function() {
        recipeCommon();
        addNewRecipeBtn.on('click', function(){
            recipeContainer.append(recipeTableBlankHtml);
            recipeCommon();
        });

        videoCommon();
        addNewVideoBtn.on('click', function(){
            videoContainer.append(videoTableBlankHtml);
            videoCommon();
        });

        registerForm.on('submit', function() {
            getRecipeData();
            getVideoData();
        });
    });

    function videoCommon() {
        const deleteVideoBtn = $('#foodVideoCard .card-body .btn-delete');
        deleteVideoBtn.on('click', function() {
            const parent = $(this).closest('table');
            parent.remove();
        });
    }

    function recipeCommon() {
        $('.select2').select2();
        const deleteRecipeBtn = $('#foodRecipeCard .card-body .btn-delete');
        deleteRecipeBtn.on('click', function() {
            const parent = $(this).closest('table');
            parent.remove();
        });
    }

    function getRecipeData() {
        let recipes = [];
        $('#foodRecipeCard .card-body table').each(function() {
            recipes.push({
                ingredient_id: $(this).find('select[name="ingredient_id[]"]').val(),
                weight: $(this).find('input[name="weight[]"]').val(),
                recipe_type: $(this).find('select[name="recipe_type[]"]').val(),
                note: $(this).find('textarea[name="note[]"]').val(),
            });
        });
        inputFoodRecipes.val(JSON.stringify(recipes));
    }

    function getVideoData() {
        let videos = [];
        $('#foodVideoCard .card-body table').each(function() {
            videos.push({
                video_name: $(this).find('input[name="video_name[]"]').val(),
                video_type: $(this).find('select[name="video_type[]"]').val(),
                source_id: $(this).find('input[name="source_id[]"]').val(),
            });
        });
        inputFoodVideos.val(JSON.stringify(videos));
    }
</script>
@endpush
