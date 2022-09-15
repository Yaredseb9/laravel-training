<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class SearchScope implements Scope
{
    protected $searchColumns = [];

    public function apply(Builder $builder, Model $model)
    {
        
        
        if ($search = request('search')) {

            $columns = property_exists($model, 'seartchColumns') ? $model->seartchColumns : $this->searchColumns;
            
            foreach ($columns as $index => $column ) {
                $arr = explode('.', $column);

                $method = $index === 0 ? 'where' : 'orWhere';
                if(count($arr) == 2)
                {
                    $method .= 'Has';
                    list($relationship, $col) = $arr;
                    
                    $builder->$method($relationship, function($query) use ($search,$col){
                        $query->where($col,'LIKE', "%{$search}%");
                    });

                }
                else{
                    $builder->$method($column, 'LIKE', "%{$search}%");
                }
            }

            // $builder->where('first_name', 'LIKE', "%{$search}%");
            // $builder->orWhere('last_name', 'LIKE', "%{$search}%");
            // $builder->orWhere('email', 'LIKE', "%{$search}%");
            // $builder->orWhere('company', 'LIKE', function($query) use ($search){
            //     $query->where('name','LIKE', "%{$search}%");
            // });
        }

        return $builder;
    }
}