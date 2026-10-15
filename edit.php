<?php
require_once "koneksi.php";

$id = isset($_GET['id']) ? $_GET['id'] : 1;


$query = "SELECT * FROM speakers WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data narasumber tidak ditemukan. <a href='index.php'>Kembali ke Daftar</a>");
}

$nama = $data['nama'];
$institusi = $data['institusi'];
$portofolio = $data['portofolio'];
$keahlian = explode(", ", $data['keahlian']);

$namaEror = $keahlianEror = $institusiEror = $portofolioEror = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST["nama"]);
    if (empty($nama)) {
        $namaEror = "Nama Wajib diisi";
    }

    if (empty($_POST["keahlian"])) {
        $keahlianEror = "Pilih minimal satu keahlian";
        $keahlian = [];
    } else {
        $keahlian = $_POST["keahlian"];
    }

    $institusi = trim($_POST["institusi"]);
    if (empty($institusi)) {
        $institusiEror = "Nama institusi wajib diisi";
    }

    $portofolio = trim($_POST["portofolio"]);
    if (empty($portofolio)) {
        $portofolioEror = "Portofolio wajib diisi";
    }

    
    if (empty($namaEror) && empty($keahlianEror) && empty($institusiEror) && empty($portofolioEror)) {
        $keahlian_str = implode(", ", $keahlian);

        $update_query = "UPDATE speakers SET 
                            nama = '$nama', 
                            keahlian = '$keahlian_str', 
                            institusi = '$institusi', 
                            portofolio = '$portofolio' 
                         WHERE id = $id";
        
        $update = mysqli_query($koneksi, $update_query);

        if ($update) {
            header("Location: index.php");
            exit;
        } else {
            echo "Gagal memperbarui data: " . mysqli_error($koneksi);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Narasumber</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <section class="card-section">
            <h1 class="card-title">Edit Data Narasumber</h1>
            <p class="card-subtitle">Perbarui informasi profil narasumber #<?= $id; ?></p>

            <form method="POST" action="edit.php?id=<?= $id; ?>">
                
                <div class="form-group">
                    <label for="nama">Nama Narasumber:</label>
                    <span class="error"><?= $namaEror ? "* $namaEror" : ""; ?></span> 
                    <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($nama); ?>">   
                </div>

                <div class="form-group">
                    <label>Profil Keahlian:</label>
                    <span class="error"><?= $keahlianEror ? "* $keahlianEror" : ""; ?></span>
                    <div class="checkbox-group">
                        <?php
                        $opsi = ["Web Development", "Mobile App", "UI/UX Design", "Networking", "Database"];
                        foreach ($opsi as $item):
                        ?>
                        <label>
                            <input type="checkbox" name="keahlian[]" value="<?= $item; ?>" <?= in_array($item, $keahlian) ? "checked" : ""; ?>>
                            <?= $item; ?>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="institusi">Riwayat Institusi:</label>
                    <span class="error"><?= $institusiEror ? "* $institusiEror" : ""; ?></span> 
                    <input type="text" id="institusi" name="institusi" value="<?= htmlspecialchars($institusi); ?>">
                </div>

                <div class="form-group">
                    <label for="portofolio">Tautan Portofolio:</label>
                    <span class="error"><?= $portofolioEror ? "* $portofolioEror" : ""; ?></span> 
                    <input type="text" id="portofolio" name="portofolio" value="<?= htmlspecialchars($portofolio); ?>">
                </div>

                <div class="button-container" style="display: flex; justify-content: space-between; align-items: center;">
                    <a href="index.php" class="btn-primary" style="color: #ecf1f8; text-decoration: none; font-size: 14px;">← Batal</a>
                    <button type="submit" class="btn-primary">Perbarui Data</button>
                </div>
            </form>
        </section>
    </div>

</body>
</html>