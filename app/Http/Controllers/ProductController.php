<?php
/**
 * Created by PhpStorm.
 * User: duakilodotnet
 * Date: 6/24/16
 * Time: 1:18 AM
 */

namespace App\Http\Controllers;


use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $Products  = Product::all();

        return response()->json($Products);

    }

    public function getProduct($id){

        $Product  = Product::find($id);

        return response()->json($Product);
    }

    public function createProduct(Request $request){

        $Product = Product::create($request->all());

        return response()->json($Product);

    }

    public function deleteProduct($id){
        $Product  = Product::find($id);
        $Product->delete();

        return response()->json('deleted');
    }

    public function updateProduct(Request $request,$id){
        $Product  = Product::find($id);
        $Product->title = $request->input('title');
        $Product->author = $request->input('author');
        $Product->isbn = $request->input('isbn');
        $Product->save();

        return response()->json($Product);
    }
}