<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ambil data yang dikirimkan melalui formulir
  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];

  // Gantilah alamat email penerima sesuai kebutuhan Anda
  $to = "Rendaalfaorganizer@gmail.com";

  // Siapkan subjek email
  $email_subject = "Pesan dari $name: $subject";

  // Siapkan pesan email
  $email_body = "Anda menerima pesan dari: $name\n\n";
  $email_body .= "Email pengirim: $email\n\n";
  $email_body .= "Pesan:\n$message";

  // Atur header email
  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";

  // Kirim email
  if (mail($to, $email_subject, $email_body, $headers)) {
    echo "Email berhasil dikirim."; // Pesan sukses jika email terkirim
  } else {
    echo "Email gagal dikirim. Error: " . error_get_last()['message']; // Pesan kesalahan jika email tidak dapat dikirim
  }
}
