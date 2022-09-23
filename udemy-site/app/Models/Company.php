<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name','address','website','email'];

    public $seartchColumns = ['name', 'email', 'address', 'website'];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
        
    public static function userCompanies()
    {
        // $user = Auth::user();
        return self::wehere('user_id', auth()->id)->orderBy('name')->pluck('name', 'id')->prepend('All Company', '');

    }
    
    public static function booted()
    {
        static::addGlobalScope(new \App\Scopes\SearchScope);
    }

}
