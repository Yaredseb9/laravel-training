<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\FilerScope;

class Contact extends Model
{
    use HasFactory;

    protected  $fillable = ['first_name', 'last_name','address','email','phone','company_id'];

    public $filterColumns = ['company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('id', 'desc');
    }

    protected static function booted()
    {
        static::addGlobalScope(new \App\Scopes\FilterScope);
        static::addGlobalScope(new \App\Scopes\ContactSearchScope);
    }

    // public function scopeFilter($query)
    // {
    //     if ($compony_id = request('company_id')) {
    //         $query->where('company_id', $compony_id);
    //     }
    //     if ($search = request('search')) {
    //         $query->where('first_name', 'LIKE', "%{$search}%");
    //     }

    //     return $query;
    // }
    // protected static function booted()
    // {
    //     // parent::booted();

    //     static::addGlobalScope(new App\Scopes\FilterScope);
    // }

}
