<?php
$host = "localhost";
$user = "root";
$pass = "";
$koneksi = mysqli_connect($host, $user, $pass);
mysqli_query($koneksi, "CREATE DATABASE IF NOT EXISTS db_sekolah");
mysqli_select_db($koneksi, "db_sekolah");
$tabel = "CREATE TABLE IF NOT EXISTS biodata (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    kelas VARCHAR(20),
    tempat_tgl_lahir VARCHAR(100),
    jenis_kelamin VARCHAR(20),
    agama VARCHAR(20),
    sekolah VARCHAR(100)
)";
mysqli_query($koneksi, $tabel);
$cek = mysqli_query($koneksi, "SELECT * FROM biodata LIMIT 1");
if (mysqli_num_rows($cek) == 0) {
    mysqli_query($koneksi, "INSERT INTO biodata (nama, kelas, tempat_tgl_lahir, jenis_kelamin, agama, sekolah) 
    VALUES (
        'Lionel Rodriquez Da Silva',
        '10 E1',
        'Jakarta, 04 - Juni - 2011',
        'Laki-laki',
        'Kristen',
        'SMA Diakonia'
    )");
    $cek = mysqli_query($koneksi, "SELECT * FROM biodata LIMIT 1");
}
$data = mysqli_fetch_array($cek);
header("Content-Type: text/plain");
echo "=================================================\n";
echo "            BIODATA SISWA               \n";
echo "=================================================\n";
echo "Nama Lengkap       : " . $data['nama'] . "\n";
echo "Kelas              : " . $data['kelas'] . "\n";
echo "Tempat, Tgl Lahir  : " . $data['tempat_tgl_lahir'] . "\n";
echo "Jenis Kelamin      : " . $data['jenis_kelamin'] . "\n";
echo "Agama              : " . $data['agama'] . "\n";
echo "Sekolah            : " . $data['sekolah'] . "\n";
echo "=================================================\n";
?>
