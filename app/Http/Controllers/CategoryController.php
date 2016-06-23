<?php
/**
 * Created by PhpStorm.
 * User: duakilodotnet
 * Date: 6/24/16
 * Time: 1:31 AM
 */

namespace app\Http\Controllers;


use app\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $Categories  = Category::all();

        return response()->json($Categories);

    }

    public function getCategory($id){

        $Category  = Category::find($id);

        return response()->json($Category);
    }

    public function createCategory(Request $request){

        $Category = Category::create($request->all());

        return response()->json($Category);

    }

    public function deleteCategory($id){
        $Category  = Category::find($id);
        $Category->delete();

        return response()->json('deleted');
    }

    public function updateCategory(Request $request,$id){
        $Category  = Category::find($id);
        $Category->title = $request->input('title');
        $Category->author = $request->input('author');
        $Category->isbn = $request->input('isbn');
        $Category->save();

        return response()->json($Category);
    }
}