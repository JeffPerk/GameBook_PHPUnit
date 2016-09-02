<?php
  namespace Src\Test;
  use Entity\Game;

  class GameTest extends \PHPUnit_Framework_TestCase {

    // public function setUp() {
    //  	$this->instance = new Game();
    // }

    // public function tearDown() {
    //  	unset($this->instance);
    // }

    protected function tearDown() {
      \Mockery::close();
    }


    public function testImage_WithNull_ReturnPlaceholder() {
      $game = new Game();
      $game->setImagePath(null);
      $this->assertEquals('/images/placeholder.jpg', $game->getImagePath());
    }

    public function testImage_WithPath_ReturnsPath() {
      $game = new Game();
     	$game->setImagePath('/images/game.jpg');
      $this->assertEquals('/images/game.jpg', $game->getImagePath());
    }

    public function testIsRecommended_With5_ReturnTrue() {
      $mock = \Mockery::mock('Entity\Game[getAverageScore]');
      $mock->shouldReceive('getAverageScore')->once()->andReturn(5);

      // $game = new Game($mock);
      $this->assertTrue($mock->isRecommended());
    }

    public function testAverageScore_WithoutRatings_ReturnsNull() {
      $game = new Game();
     	$game->setRatings([]);
      $this->assertNull($game->getAverageScore());
    }

    public function testAverageScore_With6And8_Returns7() {
      $rating1Mock = \Mockery::mock('Rating');
      $rating1Mock->shouldReceive('getScore')->andReturn(6);

      $rating2Mock = \Mockery::mock('Rating');
      $rating2Mock->shouldReceive('getScore')->andReturn(8);

     	$mock = \Mockery::mock('Entity\Game[getRatings]');
      $mock->shouldReceive('getRatings')->once()->andReturn($rating1Mock, $rating2Mock);

      // $game = new Game($mock, $rating1Mock);

      // $output = $game->getAverageScore();
      $this->assertEquals(7, $mock->getAverageScore());
    }
  }
