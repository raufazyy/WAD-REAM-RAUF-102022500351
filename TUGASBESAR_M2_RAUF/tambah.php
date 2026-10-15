<?php
require_once "koneksi.php";

$nama = $institusi = $portofolio = "";
$keahlian = []; 
$namaEror = $keahlianEror = $institusiEror = $portofolioEror = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = trim($_POST["nama"]);
    if (empty($nama)) {
        $namaEror = "Nama Wajib diisi";
    }

    if (empty($_POST["keahlian"])) {
        $keahlianEror = "Pilih minimal satu keahlian";
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

        $query = "INSERT INTO speakers (nama, keahlian, institusi, portofolio) VALUES ('$nama', '$keahlian_str', '$institusi', '$portofolio')";
        $simpan = mysqli_query($koneksi, $query);

        if ($simpan) {
            
            header("Location: index.php");
            exit;
        } else {
            echo "Gagal menyimpan data: " . mysqli_error($koneksi);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Narasumber</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <section class="card-section">
            <h1 class="card-title">Pendaftaran Narasumber</h1>
            <p class="card-subtitle">Lengkapi profil narasumber untuk event dan workshop.</p>

            <form method="POST" action="tambah.php">
                
                <div class="form-group">
                    <label for="nama">Nama Narasumber:</label>
                    <span class="error"><?php echo $namaEror ? "* $namaEror" : ""; ?></span> 
                    <input type="text" id="nama" name="nama" placeholder="Contoh: Dr. Budi Santoso" value="<?php echo htmlspecialchars($nama); ?>">   
                </div>

                <div class="form-group">
                    <label>Profil Keahlian:</label>
                    <span class="error"><?php echo $keahlianEror ? "* $keahlianEror" : ""; ?></span>
                    <div class="checkbox-group">
                        <?php
                        $opsi = ["Web Development", "Mobile App", "UI/UX Design", "Networking", "Database"];
                        foreach ($opsi as $item):
                        ?>
                        <label>
                            <input type="checkbox" name="keahlian[]" value="<?php echo $item; ?>" <?php echo in_array($item, $keahlian) ? "checked" : ""; ?>>
                            <?php echo $item; ?>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="institusi">Riwayat Institusi:</label>
                    <span class="error"><?php echo $institusiEror ? "* $institusiEror" : ""; ?></span> 
                    <input type="text" id="institusi" name="institusi" placeholder="Contoh: Telkom University" value="<?php echo htmlspecialchars($institusi); ?>">
                </div>

                <div class="form-group">
                    <label for="portofolio">Tautan Portofolio:</label>
                    <span class="error"><?php echo $portofolioEror ? "* $portofolioEror" : ""; ?></span> 
                    <input type="text" id="portofolio" name="portofolio" placeholder="https://github.com/username" value="<?php echo htmlspecialchars($portofolio); ?>">
                </div>

                <div class="button-primary" style="display: flex; justify-content: space-between; align-items: center;">
                    <a href="index.php" class="btn-primary" style="color: #eef0f4; text-decoration: none; font-size: 14px;">← Kembali ke Daftar</a>
                    <button type="submit" class="btn-primary">Simpan Narasumber</button>
                </div>
            </form>
        </section>
    </div>

</body>
</html>