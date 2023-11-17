<?php
session_start();
if (!isset($_SESSION["login"])) {
    $_SESSION = [];
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

include "conn.php";
include "./Model/data.model.php";
include "./Controller/data.controller.php";
include "./View/data.view.php";
$datas = new DataView();

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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | Tambah Data</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="public/css/sidebars.css" />
    <link rel="shortcut icon" href="public/image/untan.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

</head>

<body>
    <div class="sidebar d-flex flex-column flex-shrink-0 p-1 p-md-3 bg-body-secondary">
        <a href="" class="d-flex align-items-center mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <span class="fs-4 fw-bold text-text-center">
                <img src="public/image/untan.png" width="30px" class="mx-1 me-md-2">
                <span class="text-dashboard-item">Smbd App</span>
            </span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li>
                <a href="index.php" class="nav-link link-body-emphasis text-dashboard-item">
                    Dashboard
                </a>
                <a href="index.php" class="nav-link link-body-emphasis icon-dashboard-item p-0 m-0 py-1 text-center"
                    data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Dashboard">
                    <i class="bi bi-speedometer fs-5"></i>
                </a>
            </li>
            <li>
                <a href="all-grafik.php" class="nav-link link-body-emphasis text-dashboard-item">
                    Semua Grafik
                </a>
                <a href="all-grafik.php"
                    class="nav-link link-body-emphasis icon-dashboard-item p-0 m-0 py-1 text-center"
                    data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Semua Grafik">
                    <i class="bi bi-graph-up fs-5"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="data-tables.php" class="nav-link active text-dashboard-item">
                    Data Grafik
                </a>
                <a href="data-tables.php" class="nav-link active icon-dashboard-item p-0 m-0 py-1 text-center"
                    data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Data Grafik">
                    <i class="bi bi-table fs-5"></i>
                </a>
            </li>

        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-3 me-2"></i>

                <strong class="text-dashboard-item"><?= $_SESSION['admin-name'] ?></strong>
            </a>
            <ul class="dropdown-menu text-small shadow">
                <li>
                    <form action="logout.php" method="POST">
                        <button type="submit" class="dropdown-item" name="logout">
                            <span>
                                Log Out <i class="bi bi-box-arrow-right fs-5"></i>
                            </span></button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <div class="container scrollarea">
            <div class="row">
                <div class="col-md-12 pt-3 pb-3 border-bottom bg index">
                    <a href="" class="d-flex align-items-center me-md-auto text-dark text-decoration-none">
                        <span class="fs-6 text-muted me-2">Dashboard </span><span class="fs-4 text-muted"> -
                        </span><span class="ms-2 fs-6 fw-bold"> Data Grafik</span>
                    </a>
                </div>
            </div>
            <div class="row m-2 mt-5">
                <div class="col-md-12 shadow-lg border border-0 rounded-4 mt-5 mb-5">
                    <div class="row mb-2">
                        <div class="col-md-12 bg-primary text-center border-0 border-bottom rounded-top-4 p-2">
                            <span class="fs-5 text-white fw-bold">
                                tambah data
                            </span>
                        </div>
                    </div>
                    <div class="row m-2 mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <a href="data-tables.php" class="text-decoration-none">
                            <button type="button" class="btn btn-outline-warning"><i class="bi bi-arrow-left-circle me-2"></i>Kembali</button>
                        </a>
                    </div>
                </div>
                    <form action="" method="post">
                            <fieldset>
                                <legend>Data Details</legend>

                                <div class="form-group">
                                    <label for="gas">Gas (ppm):</label>
                                    <input type="text" name="gas" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="suhu_lingkungan">Suhu Lingkungan (°C):</label>
                                    <input type="text" name="suhu_lingkungan" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="warna_buah_id">Warna Buah:</label>
                                    <select name="warna_buah_id" class="form-control" required>
                                    <?php
                                    $warnaSql = "SELECT * FROM warna_buah";
                                    $resultWarna = $mysqli->query($warnaSql);

                                    while ($warna = $resultWarna->fetch_assoc()) {
                                        echo "<option value='" . $warna['id'] . "'>" . $warna['warna'] . "</option>";
                                    }
                                    ?>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                            </fieldset>
                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
    <script src="public/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/sidebars.js"></script>
    <script src="public/js/script.js"></script>
</body>


</html>