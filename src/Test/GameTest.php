<?php
  namespace Src\Test;
  use Entity\Game;

  class GameTest extends \PHPUnit_Framework_TestCase {

    public function setUp() {
     	$this->instance = new Game();
    }

    public function tearDown() {
     	unset($this->instance);
    }

    public function testImage_WithNull_ReturnPlaceholder() {
      $this->instance->setImagePath(null);
      $this->assertEquals('/images/placeholder.jpg', $this->instance->getImagePath());
    }
  }
