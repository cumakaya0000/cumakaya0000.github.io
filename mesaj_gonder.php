<?php
// Veritabanı bağlantısı için parametreler
$servername = "localhost";
$username = "root";  // XAMPP varsayılan kullanıcı adı
$password = "";  // XAMPP varsayılan şifre boş
$dbname = "iletisim_formu";
  // Kullanmak istediğiniz veritabanı adı

// Veritabanı bağlantısı
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
}

// POST verilerini al
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ad = isset($_POST['ad']) ? $_POST['ad'] : '';
    $soyad = isset($_POST['soyad']) ? $_POST['soyad'] : '';
    $numara = isset($_POST['numara']) ? $_POST['numara'] : '';
    $mail = isset($_POST['mail']) ? $_POST['mail'] : '';
    $konu = isset($_POST['konu']) ? $_POST['konu'] : '';
    $mesaj = isset($_POST['mesaj']) ? $_POST['mesaj'] : '';

    // SQL sorgusu ile verileri veritabanına ekleme
    $sql = "INSERT INTO mesajlar (ad, soyad, numara, mail, konu, mesaj) 
            VALUES ('$ad', '$soyad', '$numara', '$mail', '$konu', '$mesaj')";

    if ($conn->query($sql) === TRUE) {
        echo "Mesajınız başarıyla gönderildi.";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}

// Veritabanı bağlantısını kapat
$conn->close();
?>
