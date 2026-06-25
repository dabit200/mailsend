<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $to = filter_var($_POST['to'], FILTER_SANITIZE_EMAIL);
    $from = filter_var($_POST['from'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/plain;charset=UTF-8\r\n";
    $headers .= "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "<h2>Email berhasil dikirim!</h2>";
    } else {
        echo "<h2>Gagal mengirim email.</h2>";
    }

} else {
    echo "Akses ditolak.";
}
?>
