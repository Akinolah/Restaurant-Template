<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize the form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $datetime = htmlspecialchars($_POST['datetime']);
    $people = htmlspecialchars($_POST['people']);
    $message = htmlspecialchars($_POST['message']);

    // Prepare the email content
    $to = "quyumolatowo@gmail.com";  
    $subject = "New Reservation Request";
    $body = "
    New reservation request:
    
    Name: $name
    Email: $email
    Date & Time: $datetime
    Number of People: $people
    Special Request: $message
    ";

    // Set headers for email
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Reservation confirmed. We will contact you soon!');</script>";
    } else {
        echo "<script>alert('There was an issue with your reservation. Please try again later.');</script>";
    }
}
?>