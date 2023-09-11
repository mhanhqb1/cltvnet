<?php

namespace App\Http\Requests;

use App\Common\Definition\FoodType;
use App\Common\Definition\FileDefs;
use App\Common\Definition\Level;
use App\Common\Definition\MealType;
use App\Common\Definition\RecipeType;
use App\Common\Definition\VideoType;
use App\Models\Food;
use App\Models\FoodArticle;
use App\Models\FoodRecipe;
use App\Models\FoodVideo;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\ValidationException;

class FoodRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('foods', 'name')->ignore($this->foodId, 'food_id')],
            'cate_id' => ['nullable'],
            'meal_type' => ['required'],
            'image' => ['nullable', 'image', 'max:'.FileDefs::IMAGE_MAX_SIZE],
            'description' => ['nullable'],
            'detail' => ['nullable'],
            'type' => ['required', new Enum(FoodType::class)],
            'level' => ['required', new Enum(Level::class)],
            'time' => ['nullable', 'integer'],
            'food_recipes' => ['nullable'],
            'food_videos' => ['nullable'],
            'food_articles' => ['nullable'],
        ];
    }

    /**
     * Get the messages apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return Food::getAttributeNames();
    }

    public function multiValidated()
    {
        $params = $this->validated();
        if (!empty($params['food_recipes'])) {
            $params['food_recipes'] = json_decode($params['food_recipes'], true);
            // Todo validate detail
            $rules = [
                'ingredient_id' => ['required', Rule::exists('ingredients', 'ingredient_id')],
                'weight' => ['required', 'numeric', 'between:0,9999999.99'],
                'recipe_type' => ['required', new Enum(RecipeType::class)],
                'note' => ['nullable'],
            ];
            $messages = [];
            $attributes = FoodRecipe::getAttributeNames();
            foreach ($params['food_recipes'] as $k => $foodRecipe) {
                $validator = Validator::make($foodRecipe, $rules, $messages, $attributes);
                if ($validator->fails()) {
                    throw ValidationException::withMessages(array_merge($validator->errors()->toArray(), ['row' => $k]));
                }
            }
        }

        if (!empty($params['food_videos'])) {
            $params['food_videos'] = json_decode($params['food_videos'], true);
            // Todo validate detail
            $rules = [
                'video_type' => ['required', new Enum(VideoType::class)],
                'video_name' => ['required'],
                'source_id' => ['required'],
            ];
            $messages = [];
            $attributes = FoodVideo::getAttributeNames();
            foreach ($params['food_videos'] as $k => &$foodVideo) {
                $validator = Validator::make($foodVideo, $rules, $messages, $attributes);
                if ($validator->fails()) {
                    throw ValidationException::withMessages(array_merge($validator->errors()->toArray(), ['row' => $k]));
                }
                $foodVideo['slug'] = createSlug($foodVideo['video_name']);
            }
        }

        if (!empty($params['food_articles'])) {
            $params['food_articles'] = json_decode($params['food_articles'], true);
            // Todo validate detail
            $rules = [
                'article_url' => ['required'],
            ];
            $messages = [];
            $attributes = FoodArticle::getAttributeNames();
            foreach ($params['food_articles'] as $k => $foodArticle) {
                $validator = Validator::make($foodArticle, $rules, $messages, $attributes);
                if ($validator->fails()) {
                    throw ValidationException::withMessages(array_merge($validator->errors()->toArray(), ['row' => $k]));
                }
            }
        }
        return $params;
    }
}
