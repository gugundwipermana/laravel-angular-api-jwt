<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    use SoftDeletes;
    
    protected $table = 'categories';
    protected $fillable = ['name'];
    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
