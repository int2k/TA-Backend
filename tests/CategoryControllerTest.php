<?php
/**
 * Created by PhpStorm.
 * User: duakilodotnet
 * Date: 6/24/16
 * Time: 1:36 AM
 */

namespace tests;


use Laravel\Lumen\Testing\DatabaseMigrations;

class CategoryControllerTest extends \PHPUnit_Framework_TestCase
{
    use DatabaseMigrations;

    public function testPostBasic() {
        $this->json('POST', '/category', ['name' => 'Category A'])
            ->seeJson([
                'created' => true,
            ]);
    }
}
