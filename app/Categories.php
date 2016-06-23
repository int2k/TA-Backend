<?php
/**
 * Created by PhpStorm.
 * User: duakilodotnet
 * Date: 6/24/16
 * Time: 1:20 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Categories extends  Model
{
    protected $fillable = ['name', 'parent_id'];
}