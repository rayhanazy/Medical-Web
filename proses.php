<?php
include 'koneksi.php';

$nama     = mysqli_real_escape_string($conn, $_POST['nama'] ?? '');
$nomor    = mysqli_real_escape_string($conn, $_POST['nomor'] ?? '');
$email    = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
$penyakit = $_POST['penyakit'] ?? '';
$dokter   = $_POST['dokter'] ?? '';
$tanggal  = $_POST['tanggal'] ?? '';
$waktu    = $_POST['waktu'] ?? '';

if (empty($nama) || empty($nomor) || empty($email) || $penyakit == 'Pilih' || empty($dokter) || empty($tanggal) || empty($waktu)) {
    echo '
    <div class="popup">
        <div class="popup-content">
            <p>Gagal! Mohon lengkapi semua kolom.</p>
            <button onclick="closePopup()">Tutup</button>
        </div>
    </div>
    ';
} else {
    $insert = mysqli_query($conn, "INSERT INTO `contact_form` (nama, nomor, email, penyakit, dokter, tanggal, waktu)
                                   VALUES ('$nama','$nomor','$email','$penyakit','$dokter','$tanggal','$waktu')");

    if ($insert) {
        echo '
        <div class="popup">
            <div class="popup-content">
                <p>Janji Temu Berhasil!</p>
                <button onclick="closePopup()">Tutup</button>
            </div>
        </div>
        ';
    } else {
        echo '
        <div class="popup">
            <div class="popup-content">
                <p>Terjadi kesalahan saat menyimpan data.</p>
                <button onclick="closePopup()">Tutup</button>
            </div>
        </div>
        ';
    }
}

mysqli_close($conn);
?>
