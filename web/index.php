<?php
  require __DIR__ . "/vendor/autoload.php";

  use Src\GameRepository;

  $repo = new GameRepository();
  $games = $repo->findByUserId(1);
