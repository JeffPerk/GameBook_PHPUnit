<?php
  require_once "../vendor/autoload.php";
  use Repository\GameRepository;

  $repo = new GameRepository();
  $games = $repo->findByUserId(1);
?>

<ul>
  <?php foreach ($games as $game): ?>
    <li>
      <?php echo $game->getTitle(); ?><br>
      <?php echo $game->getRatings(); ?><br>
      <img src="<?php echo $game->getImagePath(); ?>"  />
    </li>
  <?php endforeach; ?>
</ul>
