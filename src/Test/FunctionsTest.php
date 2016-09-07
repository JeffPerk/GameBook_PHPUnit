<?php
  namespace Src\Test;
  use Entity\Functions;

  class FunctionsTest extends \PHPUnit_Framework_TestCase {

    protected function tearDown() {
      \Mockery::close();
    }

    public function testAddMe_With2And3_Returns5() {
      $mock = \Mockery::mock('Entity\Functions[addMe]');
      $mock->shouldReceive('addMe')->with(2, 3)->once()->andReturn(5);
      $this->assertEquals(5, $mock->addMe(2, 3));
    }

    public function testSubtractMe_With8And2_Returns6() {
      $mock = \Mockery::mock('Entity\Functions[subtractMe]');
      $mock->shouldReceive('subtractMe')->with(8, 2)->once()->andReturn(6);
      $this->assertEquals(6, $mock->subtractMe(8, 2));
    }
  }
