<?php
  namespace Repository;
  use Entity\Game;

  class GameRepository {
    public function findByUserId() {
     	$games = [];
      for ($i=1; $i < 6; $i++) {
        $game = new Game();
        $game->setTitle("Game " . $i);
        $game->setImagePath('images/game.jpg');
        $game->setRating(4.5);
        $games[] = $game;
      }
      return $games;
    }
  }
