
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newMovie = [
        "title" => $_POST['title'],
        "slug" => $_POST['slug'],
        "thumb" => $_POST['thumb'],
        "suggestThumb" => $_POST["suggestThumb"],
        "iframe" => $_POST['iframe'],
        "desc" => $_POST['desc']
    ];

    $file = 'movies.json';
    $movies = [];

    if (file_exists($file)) {
        $movies = json_decode(file_get_contents($file), true);
        
        // Prevent duplicate slugs
        foreach ($movies as $movie) {
            if ($movie['slug'] === $newMovie['slug']) {
                die("❌ Movie with the same slug already exists!");
            }
        }
    }

    $movies[] = $newMovie;

    if (file_put_contents($file, json_encode($movies, JSON_PRETTY_PRINT))) {
        header("Location: index.php");
        exit;
    } else {
        echo "❌ Failed to save movie to JSON.";
    }
}
?>
