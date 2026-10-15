<?php
require_once "koneksi.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    
    $query = "DELETE FROM speakers WHERE id = $id";
    mysqli_query($koneksi, $query);
}


header("Location: index.php");
exit;
?>