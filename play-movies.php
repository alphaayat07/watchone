<?php



$slug = $_GET['slug'] ?? '';
$file = 'movies.json';

if (!file_exists($file)) die("Movies data not found.");
$movies = json_decode(file_get_contents($file), true);

$current = null;
foreach ($movies as $movie) {
    if ($movie['slug'] === $slug) {
        $current = $movie;
        break;
    }
}
if (!$current) die("Movie not found.");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $current['title'] ?> – WatchOne</title>

  <link rel="stylesheet" href="mose.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="universal.css">
</head>
<body>
  <h1>WatchOne</h1>

  <div class="movie">
    <h2><?= $current['title'] ?></h2>
    <iframe src="<?= $current['iframe'] ?>" allowfullscreen></iframe>
  </div>

  <div class="suggested">
    <h3>Suggested Movies</h3>
    <div class="suggested-list">
    <?php if (!empty($movie['suggestThumb'])): ?>
    <div class="suggested">
        <h3>Suggested</h3>
        <div class="suggested-list">
            <a href="play-movies.php?slug=<?= $movie['slug'] ?>" class="suggested-item">
                <img src="<?= $movie['suggestThumb'] ?>" alt="Suggested Thumbnail">
                <div class="suggested-info">
                    <h4><?= $movie['title'] ?></h4>
                    <p><?= $movie['desc'] ?></p>
                </div>
            </a>
        </div>
    </div>
<?php endif; ?>
    </div>
  </div>
</body>
</html>
