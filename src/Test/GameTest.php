<?php
  namespace Src\Test;
  use Entity\Game;

  class GameTest extends \PHPUnit_Framework_TestCase {

    public function setUp() {
     	$this->instance = new Game();
    }

    // public function tearDown() {
    //  	unset($this->instance);
    // }

    protected function tearDown() {
      \Mockery::close();
    }


    public function testImage_WithNull_ReturnPlaceholder() {
      $this->instance->setImagePath(null);
      $this->assertEquals('/images/placeholder.jpg', $this->instance->getImagePath());
    }

    public function testImage_WithPath_ReturnsPath() {
     	$this->instance->setImagePath('/images/game.jpg');
      $this->assertEquals('/images/game.jpg', $this->instance->getImagePath());
    }

    public function testIsRecommended_With5_ReturnTrue() {
      $mock = $this->getMockBuilder('\Game')->setMethods(['getAverageScore', 'isRecommended'])->getMock();

      $mock->expects($this->once())->method('getAverageScore')->will($this->returnValue(5));
      $mock->expects($this->once())->method('isRecommended');

      $game = new Game($mock);
      $this->assertTrue($game->isRecommended());

      // $mock = \Mockery::mock('Game')->makePartial();
      // $mock->shouldReceive('getAverageScore')->once()->andReturn(5);
      //
      // $game = new Game($mock);
      // $output = $game->isRecommended();
      // var_dump($output);
      // $this->assertTrue($output);
    }

    public function testAverageScore_WithoutRatings_ReturnsNull() {
     	$this->instance->setRatings([]);
      $this->assertNull($this->instance->getAverageScore());
    }

    public function testAverageScore_With6And8_Returns7() {
      // $rating1Mock = \Mockery::mock('Rating');
      // $rating1Mock->shouldReceive('getScore')->twice()->andReturn(6, 8);
      //
      // $rating2Mock = \Mockery::mock('Rating');
      // $rating2Mock->shouldReceive('getScore')->twice()->andReturn(8);
      //
     // 	$mock = \Mockery::mock('Game');
      // $mock->shouldReceive('getRatings')->withAnyArgs()->once()->andReturn($rating1Mock);
      //
      // $game = new Game($mock, $rating1Mock);
      //
      // $output = $game->getAverageScore();
      // $this->assertEquals(7, $output);
    }
  }
