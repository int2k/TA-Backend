<?php
/**
 * Created by PhpStorm.
 * User: duakilodotnet
 * Date: 6/24/16
 * Time: 1:19 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'size', 'color'];


    public function categories()
    {
        return $this->belongsToMany('App\Category', 'products_categories');
    }
}