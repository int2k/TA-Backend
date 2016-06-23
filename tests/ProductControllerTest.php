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

    public function testPostBasic() {
        $this->json('POST', '/api/v1/product', ['name' => 'Category A', 'price'=> 10])
            ->seeJson([
                'name' => 'Category A',
            ]);
    }
}
