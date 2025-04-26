<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Movie</title>
  <link rel="stylesheet" href="universal.css">
</head>
<body>

<h1>Add New Movie</h1>

<div class="container">
  <form action="save.php" method="post">
    <label>Title:</label>
    <input type="text" name="title" required>

    <label>Slug (URL-safe):</label>
    <input type="text" name="slug" required>

    <label>Thumbnail URL:</label>
    <input type="text" name="thumb" required>

    <label>iFrame Link:</label>
    <input type="text" name="iframe" required>

    <label for="suggestThumb">Suggest Thumbnail URL:</label>
<input type="text" name="suggestThumb" id="suggestThumb" placeholder="Paste suggested image URL">


    <label>Description:</label>
    <input type="text" name="desc" required>

    <button type="submit">Add Movie</button>
  </form>
</div>

</body>
</html>
