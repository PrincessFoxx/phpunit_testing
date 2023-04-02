<?php

  use PHPUnit\Framework\TestCase;
  
  /**
   * ExampleAssertionsTest
   * @group group
   */
  class ExampleAssertionsTest extends TestCase {

    /** @test */
    public function testThatStringMatch() 
    {
      $expected = "Testing";
      $actualPass = "Testing";
      $actualFail = "testing";

      $this->assertSame($expected, $actualPass);
      $this->assertNotSame($expected, $actualFail);
    }

    /** @test */
    public function testThatNumbersAddUp()
    {
      $this->assertEquals(10, 5+5);
    }
    
  
  }
  