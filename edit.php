<?php
session_start();
include "conn.php";

// Pastikan ID dikirim melalui URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: data-tables.php");
    exit();
}

$id = $_GET['id'];

// Ambil data dari database sesuai dengan ID
$sql = "SELECT * FROM data WHERE id = $id";
$result = $mysqli->query($sql);

if ($result->num_rows == 1) {
    $data = $result->fetch_assoc();
} else {
    echo "Data not found";
    exit();
}

// Proses form edit jika ada data yang dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $gas = $_POST['gas'];
    $suhu_lingkungan = $_POST['suhu_lingkungan'];
    $warna_buah_id = $_POST['warna_buah_id'];

    // Update data di database
    $updateSql = "UPDATE data SET gas='$gas', suhu_lingkungan='$suhu_lingkungan', warna_buah_id='$warna_buah_id' WHERE id=$id";

    if ($mysqli->query($updateSql)) {
        echo "Data updated successfully";
    } else {
        echo "Error updating data: " . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>

<body>
    <h2>Edit Data</h2>
    <form action="" method="post">
        <label for="gas">Gas (ppm):</label>
        <input type="text" name="gas" value="<?php echo $data['gas']; ?>" required>

        <label for="suhu_lingkungan">Suhu Lingkungan (°C):</label>
        <input type="text" name="suhu_lingkungan" value="<?php echo $data['suhu_lingkungan']; ?>" required>

        <label for="warna_buah_id">Warna Buah:</label>
        <select name="warna_buah_id" required>
            <!-- Tampilkan pilihan warna buah -->
            <?php
            $warnaSql = "SELECT * FROM warna_buah";
            $resultWarna = $mysqli->query($warnaSql);

            while ($warna = $resultWarna->fetch_assoc()) {
                $selected = ($warna['id'] == $data['warna_buah_id']) ? "selected" : "";
                echo "<option value='" . $warna['id'] . "' $selected>" . $warna['warna'] . "</option>";
            }
            ?>
        </select>

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>

</html>