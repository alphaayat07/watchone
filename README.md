<?php
$moviesFile = 'movies.json';
$seriesFile = 'series.json';

$movies = file_exists($moviesFile) ? json_decode(file_get_contents($moviesFile), true) : [];
$series = file_exists($seriesFile) ? json_decode(file_get_contents($seriesFile), true) : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WatchOne</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <h1 class="logo">WatchOne</h1>
        <input type="text" placeholder="Search movies & series..." class="search-bar" id="searchInput">
        <button class="play-btn" onclick="window.location.href='sign-up.html'">Sign up</button>
    </nav>

    <!-- Menu -->
    <div class="menu">
        <button class="menu-btn">Home</button>
        <button class="menu-btn">Movies</button>
        <button class="menu-btn">Series</button>
        <button class="menu-btn">My List</button>
        <button class="menu-btn">Profile</button>
    </div>

    <!-- Movies Section -->
    <h2 style="color:#00bcd4;">🎬 Movies</h2>
    <div class="content">
        <div class="movies">
            <?php foreach ($movies as $movie): ?>
                <div class="movie" data-title="<?= htmlspecialchars($movie['title']) ?>">
                    <img src="<?= $movie['thumb'] ?? 'https://via.placeholder.com/240x350?text=No+Image' ?>" alt="<?= htmlspecialchars($movie['title']) ?>">
                    <h3><?= htmlspecialchars($movie['title']) ?></h3>
                    <button class="play-btn" onclick="window.location.href='play-movies.php?slug=<?= urlencode($movie['slug']) ?>'">▶ Play</button>
                </div>
            <?php endforeach; ?>
        </div>
    </div>



    <!-- Search Script -->


    <script>
        document.getElementById("searchInput").addEventListener("input", function () {
            const input = this.value.toLowerCase();
            document.querySelectorAll(".movie").forEach(movie => {
                const title = movie.getAttribute("data-title").toLowerCase();
                movie.style.display = title.includes(input) ? "block" : "none";
            });
        });
    </script>
</body>
</html>
