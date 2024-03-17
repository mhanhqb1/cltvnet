<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class BaseModel extends Model
{
    /**
     * @param Builder $builder
     * @param array $conditions
     * @param array $map
     * @return Builder
     */
    static public function setWhereClause(Builder $builder, array $conditions, array $map): Builder
    {
        foreach ($conditions as $key => $value) {
            if (isset($map[$key]) && isset($value)) {
                $builder = $map[$key]($builder, $value);
            }
        }

        return $builder;
    }

    public function getImageFormat() {
        return $this->image ? "<img src='".getImageUrl($this->image)."' width='100px' />" : "";
    }
}
