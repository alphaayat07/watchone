<?php
$host = 'sql109.infinityfree.com';  // InfinityFree host
$user = 'if0_38746473';             // MySQL username
$password = 'LRtpCEmHYGcst'; // yeh tumhara vPanel ka password hoga
$database = 'if0_38746473_watchone'; // Database name

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
echo "✅ Connected successfully!";
?>
