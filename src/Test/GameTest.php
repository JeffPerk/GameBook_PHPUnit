<?php
  namespace Src\Test;
  use Entity\Game;

  class GameTest extends \PHPUnit_Framework_TestCase {

    protected function tearDown() {
      \Mockery::close();
    }


    public function testImage_WithNull_ReturnPlaceholder() {
      // $game = new Game();
      $game = \Mockery::mock(new Game);
      $game->setImagePath(null);
      $this->assertEquals('/images/placeholder.jpg', $game->getImagePath());
    }

    public function testImage_WithPath_ReturnsPath() {
      // $game = new Game();
      $game = \Mockery::mock(new Game);
     	$game->setImagePath('/images/game.jpg');
      $this->assertEquals('/images/game.jpg', $game->getImagePath());
    }

    public function testIsRecommended_With5_ReturnTrue() {
      $mock = \Mockery::mock('Entity\Game[getAverageScore]');
      $mock->shouldReceive('getAverageScore')->once()->andReturn(5);

      $this->assertTrue($mock->isRecommended());
    }

    public function testAverageScore_WithoutRatings_ReturnsNull() {
      $game = \Mockery::mock('Entity\Game[setRatings]');
      $game->shouldReceive('setRatings')->with([]);
      $this->assertNull($game->getAverageScore());
    }

    public function testAverageScore_With6And8_Returns7() {
      $rating1Mock = \Mockery::mock('Rating');
      $rating1Mock->shouldReceive('getScore')->andReturn(6);

      $rating2Mock = \Mockery::mock('Rating');
      $rating2Mock->shouldReceive('getScore')->andReturn(8);

     	$mock = \Mockery::mock('Entity\Game[getRatings]');
      $mock->shouldReceive('getRatings')->once()->andReturn([$rating1Mock, $rating2Mock]); //Since getAverageScore uses a foreach loop, andReturn should be an array

      $this->assertEquals(7, $mock->getAverageScore());
    }
  }
