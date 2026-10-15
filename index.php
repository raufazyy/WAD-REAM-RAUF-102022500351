<?php
require_once "koneksi.php";


$query = "SELECT * FROM speakers ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Narasumber</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" style="max-width: 900px;">
        <section class="card-section">
            <div class="header-actions">
                <div>
                    <h1 class="card-title">Daftar Narasumber / Speaker</h1>
                    <p class="card-subtitle" style="margin-bottom: 0; padding-bottom: 0; border: none;">
                        Modul Pembicara - Sistem Pengelolaan Event & Workshop
                    </p>
                </div>
                <a href="tambah.php" class="btn-primary btn-add">+ Tambah Pembicara</a>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 25%;">Nama Lengkap</th>
                            <th style="width: 20%;">Institusi</th>
                            <th style="width: 25%;">Keahlian</th>
                            <th style="width: 12%;">Portofolio</th>
                            <th style="width: 13%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($result) > 0): ?>
                            <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><strong><?= htmlspecialchars($row['nama']); ?></strong></td>
                                    <td><?= htmlspecialchars($row['institusi']); ?></td>
                                    <td>
                                        <?php 
                                        $items = explode(", ", $row['keahlian']);
                                        foreach ($items as $item) {
                                            echo '<span class="badge">' . htmlspecialchars(trim($item)) . '</span> ';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?= htmlspecialchars($row['portofolio']); ?>" target="_blank" class="link-portfolio">
                                            Buka ↗j
                                        </a>
                                    </td>
                                    <td>
                                        <a href="edit.php?id=<?= $row['id']; ?>" class="btn-action btn-edit">Edit</a>
                                        <a href="hapus.php?id=<?= $row['id']; ?>" class="btn-action btn-delete" onclick="return confirm('Yakin ingin menghapus narasumber ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" style="text-align: center; color: #94a3b8; padding: 30px;">
                                    Belum ada data narasumber. Silakan klik tombol <strong>"+ Tambah Pembicara"</strong> di atas.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>
</html>