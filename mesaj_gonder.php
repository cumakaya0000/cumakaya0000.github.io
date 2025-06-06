<?php
include 'veritabani.php';

// Formdan gelen veriler
$ad = $_POST['firstName'];
$soyad = $_POST['lastName'];
$konu = $_POST['subject'];
$telefon = $_POST['phone'];
$email = $_POST['email'];
$mesaj = $_POST['message'];

// SQL sorgusu
$sql = "INSERT INTO GenelMesaj (ad, soyad, konu, telefon, gmail, mesaj) 
        VALUES ('$ad', '$soyad', '$konu', '$telefon', '$email', '$mesaj')";

// Veritabanına gönder
if ($conn->query($sql) === TRUE) {
    echo "Mesaj başarıyla gönderildi.";
} else {
    echo "Hata: " . $conn->error;
}

$conn->close();
?>
