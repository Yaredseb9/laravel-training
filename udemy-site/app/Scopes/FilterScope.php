<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class FilterScope implements Scope
{
    protected $filterColumns = [];

    public function apply(Builder $builder, Model $model)
    {
        $columns = property_exists($model, 'filterColumns') ? $model->filterColumns : $this->filterColumns;
        // dd($columns);
        foreach ($columns as $key => $column) {
            if ($value = request($column)) {
                $builder->where($column, $value);
            }
        }

        return $builder;
    }
}