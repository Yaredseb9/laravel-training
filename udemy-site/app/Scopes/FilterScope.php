<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class FilterScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        
        if ($compony_id = request('company_id')) {
            $builder->where('company_id', $compony_id);
        }
        if ($search = request('search')) {
            $builder->where('first_name', 'LIKE', "%{$search}%");
        }

        return $builder;
    }
}