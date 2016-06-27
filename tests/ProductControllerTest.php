<?php
/**
 * Created by PhpStorm.
 * User: duakilodotnet
 * Date: 6/24/16
 * Time: 1:30 AM
 */


use Laravel\Lumen\Testing\DatabaseMigrations;

class ProductControllerTest extends TestCase
{
    use DatabaseMigrations;

//    public function testCategoryBasic() {
//        $this->json('POST', '/api/v1/category', ['name' => 'Category A'])
//            ->seeJson([
//                'name' => 'Category A',
//            ]);
//    }

    public function testPostBasic() {
        $this->json('POST', '/api/v1/product', ['name' => 'Product A', 'price'=> 10, 'color'=> '', 'size' => ''])
            ->seeJson([
                'name' => 'Product A',
            ]);
    }
}
