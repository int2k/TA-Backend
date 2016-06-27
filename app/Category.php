<?php
/**
 * Created by PhpStorm.
 * User: duakilodotnet
 * Date: 6/24/16
 * Time: 1:34 AM
 */

namespace app;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'parent_id'];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function childs() {
        return $this->hasMany('App\Categories', 'id', 'parent_id');
    }

    public function parent() {
        return $this->belongsTo('App\Categories', 'parent_id', 'id');
    }
}