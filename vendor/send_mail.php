<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contact_name = $_POST['contact_name'];
    $contact_email = $_POST['contact_email'];
    $contact_phone = $_POST['contact_phone'];
    $contact_subject = $_POST['contact_subject'];
    $contact_message = $_POST['contact_message'];

    // E-posta gönderimini kontrol et
    if (filter_var($contact_email, FILTER_VALIDATE_EMAIL)) {
        $to = "enesdilaversahin@gmail.com"; // Alıcı e-posta adresi
        $subject = "New Contact Form Submission: " . $contact_subject;
        $message = "Name: " . $contact_name . "\n" .
                   "Email: " . $contact_email . "\n" .
                   "Phone: " . $contact_phone . "\n" .
                   "Message: " . $contact_message;
        $headers = "From: " . $contact_email;

        if (mail($to, $subject, $message, $headers)) {
            echo true; // E-posta başarıyla gönderildi
        } else {
            echo "Failed to send email."; // E-posta gönderilemedi
        }
    } else {
        echo "Invalid email address."; // Geçersiz e-posta adresi
    }
}
?>