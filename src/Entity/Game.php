<?php
  namespace Entity;

  class Game {
    protected $title;
    protected $imagePath;
    protected $ratings;

    public function getAverageScore() {
      $ratings = $this->getRatings();
      $numRatings = count($ratings);

      if ($numRatings === 0) {
        return null;
      }

      $total = 0;
      foreach ($ratings as $rating) {
        $total += $rating->getScore();
      }
      return $total / $numRatings;
    }

    public function isRecommended() {
      return $this->getAverageScore() >= 3;
    }

    public function getTitle() {
     	return $this->title;
    }

    public function setTitle($value) {
     	$this->title = $value;
    }

    public function getImagePath() {
      if ($this->imagePath == null) {
        return '/images/placeholder.jpg';
      }
     	return $this->imagePath;
    }

    public function setImagePath($value) {
     	$this->imagePath = $value;
    }

    public function getRatings() {
     	return $this->ratings;
    }

    public function setRatings($value) {
     	$this->ratings = $value;
    }
  }
