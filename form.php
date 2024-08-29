<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nameError = $emailError = $phoneError = "";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    if (empty($name)) {
        $nameError = "Name is required";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameError = "Only letters and white spaces are allowed";
    }
    if (empty($email)) {
        $emailError = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format";
    }
    if (empty($phone)) {
        $phoneError = "Phone number is required";
    } elseif (!preg_match("/^\d{10}$/", $phone)) {
        $phoneError = "Invalid phone number format (10 digits)";
    }
    if (empty($nameError) && empty($emailError) && empty($phoneError)) {
        echo "Name: $name<br>";
        echo "Email: $email<br>";
        echo "Phone: $phone<br>";
    }
}

?>