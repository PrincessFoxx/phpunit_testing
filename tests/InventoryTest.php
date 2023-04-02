<?php

use PHPUnit\Framework\TestCase;

/**
 * InventoryTest
 * @group group
 */
class InventoryTest extends TestCase
{
    /** @test */
    public function testProductsCanBeSet()
    {
        // Setup
        $mockRepo = $this->createMock(\PrincessFoxx\PhpunitTesting\ProductRepository::class);

        $inventory = new \PrincessFoxx\PhpunitTesting\Inventory($mockRepo);


        $mockProductsArray = [
            ['id' => 1, 'name' => 'Acme Radio Knobs'],
            ['id' => 2, 'name' => 'Apple iPhone'],
        ];

        $mockRepo->expects($this->exactly(1))->method('fetchProducts')->willReturn($mockProductsArray);

        // Do something

        $inventory->setProducts();

        // Make assertions
        $this->assertEquals('Acme Radio Knobs', $inventory->getProducts()[0]['name']);
        $this->assertEquals('Apple iPhone', $inventory->getProducts()[1]['name']);
    }

}
