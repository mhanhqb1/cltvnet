<?php

namespace App\Models;

use App\Common\Definition\VideoType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoodVideo extends BaseModel
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'food_videos';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'food_video_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'food_id',
        'video_type',
        'source_id',
        'video_name',
        'slug',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'video_type' => VideoType::class,
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
            'video_type' => 'select',
            'source_id' => 'text',
            'video_name' => 'text',
        ];
    }

    public function getVideoData() {
        return [
            'video_name' => $this->video_name,
            'source_id' => $this->source_id,
            'video_type' => $this->video_type?->value,
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
            'video_type' => fn (Builder $builder, $value) => $builder->where('video_type', $value),
        ];
    }
}
