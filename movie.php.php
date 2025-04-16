<?php
// === CONFIGURATION ===
$apiKey = 'AIzaSyDsJDPfVqJeF-8VbYdGc07rZ_yeCI-WSHk';
$folderId = '1ill93yaSzAizBzbj4YOdIeEScv-Q0bCU';

// === FETCH FILES FROM GOOGLE DRIVE ===
$url = "https://www.googleapis.com/drive/v3/files?q='" . $folderId . "'+in+parents&key=" . $apiKey . "&fields=files(id,name,mimeType)";
$response = file_get_contents($url);
$data = json_decode($response, true);

// === PAGE LAYOUT ===
echo "<!DOCTYPE html><html><head><title>🎬 My Movie Library</title>
<style>
body { font-family: Arial, sans-serif; background: #111; color: #fff; padding: 20px; }
h1 { text-align: center; color: #00ffcc; }
.video { margin: 30px auto; width: 90%; max-width: 720px; background: #222; padding: 20px; border-radius: 12px; box-shadow: 0 0 15px rgba(0,255,200,0.3); }
iframe { width: 100%; height: 400px; border: none; border-radius: 10px; }
h2 { margin-bottom: 10px; color: #ffcc00; }
</style>
</head><body>
<h1>🎬 My Movie Library</h1>";

if (!empty($data['files'])) {
    foreach ($data['files'] as $file) {
        // Only show video files
        if (strpos($file['mimeType'], 'video') === false) continue;

        $fileId = $file['id'];
        $fileName = $file['name'];

        echo "<div class='video'>";
        echo "<h2>$fileName</h2>";
        echo "<iframe src='https://drive.google.com/file/d/$fileId/preview' allow='autoplay'></iframe>";
        echo "</div>";
    }
} else {
    echo "<p style='text-align:center;'>Koi video file nahi mili.</p>";
}

echo "</body></html>";
?>
