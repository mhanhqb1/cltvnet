<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoodArticle extends BaseModel
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'food_articles';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'food_article_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'food_id',
        'article_name',
        'article_url',
        'article_description',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        // 'delivery_finish_date' => 'date:Y/m/d',
    ];

    public static function getAttributeNames() {
        $self = new self;
        $attrNames = [
            $self->primaryKey => __($self->primaryKey),
        ];
        foreach ($self->fillable as $field) {
            $attrNames[$field] = __($field);
        }
        return $attrNames;
    }

    public static function getAttributeInputTypes() {
        return [
            'article_name' => 'text',
            'article_url' => 'text',
            'article_description' => 'textarea',
        ];
    }

    public function getArticleData() {
        return [
            'article_name' => $this->article_name,
            'article_url' => $this->article_url,
            'article_description' => $this->article_description,
        ];
    }

    public static function scopeWhereMultiConditions(Builder $builder, array $conditions): Builder
    {
        return self::setWhereClause($builder, $conditions, self::mapWhere());
    }

    /**
     * @return \Closure[]
     */
    private static function mapWhere(): array
    {
        return [
            'food_id' => fn (Builder $builder, $value) => $builder->where('food_id', $value),
        ];
    }
}
