<?php
session_start();
include "conn.php";

// Pastikan ID dikirim melalui URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: data-tables.php");
    exit();
}

$id = $_GET['id'];

// Hapus data dari database sesuai dengan ID
$deleteSql = "DELETE FROM data WHERE id = $id";

if ($mysqli->query($deleteSql)) {
    echo "Data deleted successfully";
} else {
    echo "Error deleting data: " . $mysqli->error;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Data</title>
</head>

<body>
    <h2>Data Deleted</h2>
    <p>Data has been deleted successfully. <a href="data-tables.php">Back to Data Table</a></p>
</body>

</html>