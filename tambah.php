<?php
session_start();
include "conn.php";

// Proses form tambah jika data dikirimkan melalui POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $gas = $_POST['gas'];
    $suhu_lingkungan = $_POST['suhu_lingkungan'];
    $warna_buah_id = $_POST['warna_buah_id'];

    // Tambahkan data ke dalam tabel
    $insertSql = "INSERT INTO data (gas, suhu_lingkungan, warna_buah_id) VALUES ('$gas', '$suhu_lingkungan', '$warna_buah_id')";

    if ($mysqli->query($insertSql)) {
        echo "Data added successfully";
    } else {
        echo "Error adding data: " . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>

<body>
    <h2>Tambah Data</h2>
    <form action="" method="post">
        <label for="gas">Gas (ppm):</label>
        <input type="text" name="gas" required>

        <label for="suhu_lingkungan">Suhu Lingkungan (°C):</label>
        <input type="text" name="suhu_lingkungan" required>

        <label for="warna_buah_id">Warna Buah:</label>
        <select name="warna_buah_id" required>
            <!-- Tampilkan pilihan warna buah -->
            <?php
            $warnaSql = "SELECT * FROM warna_buah";
            $resultWarna = $mysqli->query($warnaSql);

            while ($warna = $resultWarna->fetch_assoc()) {
                echo "<option value='" . $warna['id'] . "'>" . $warna['warna'] . "</option>";
            }
            ?>
        </select>

        <button type="submit">Tambah Data</button>
    </form>
</body>

</html>