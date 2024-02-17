<?php

namespace App\Traits;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

trait Searchable
{
    public function scopeSearch(Builder $builder, string $query = '')
    {
        if (! $this->searchable) {
            throw new Exception('Searchable array property missing.');
        }

        foreach ($this->searchable as $searchable) {

            if (str_contains($searchable, '.')) {

                $relation = Str::beforeLast($searchable, '.');

                $column = Str::afterLast($searchable, '.');

                $builder->orWhereRelation($relation, $column, 'like', "%{$query}%");

                continue;
            }

            $builder->orWhere($searchable, 'like', "%{$query}%");
        }

        return $builder;
    }
}
