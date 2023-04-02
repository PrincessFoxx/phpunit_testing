<?php

require_once __DIR__ . "/../vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use PrincessFoxx\PhpunitTesting\Cart;

use function PHPUnit\Framework\assertStringStartsWith;

/**
 * CartTest
 * @group group
 */
class CartTest extends TestCase
{
    protected Cart $cart;

    protected function setUp(): void
    {
        parent::setUp();
    
        $this->cart = new Cart();
    }

    protected function tearDown(): void
    {
        Cart::$tax = 1.2;
    }
    

    /** @test */
    public function  testCorrectNetPriceReturned()
    {
        $this->cart = new Cart();
        $this->cart->price = 10;
        $netprice = $this->cart->getNetPrice();

        $this->assertEquals(12, $netprice);
    }

    /** @test */
    public function testTaxValueCanBeChangedStaticly()
    {
        Cart::$tax = 1.5;

        $this->cart = new Cart();
        $this->cart->price = 10;
        $netprice = $this->cart->getNetPrice();

        $this->assertEquals(15, $netprice);
    }

    /** @test */
    public function testTypeErrorThrownWhenAddToPrice()
    {
        try {
            $this->cart->AddToPrice("ten");

            $this->fail("TypeError not thrown");
        } catch (TypeError $e) {
            $this->assertStringStartsWith("PrincessFoxx\PhpunitTesting\Cart::AddToPrice()", $e->getMessage());
        }
    }
    
}