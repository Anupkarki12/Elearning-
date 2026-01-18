<?php
include "db.php";

if (!isset($_POST['password'], $_POST['confirm_password'])) {
    die("Form not submitted properly");
}

$first = $_POST['first_name'];
$middle = $_POST['middle_name'];
$last = $_POST['last_name'];
$phone = $_POST['phone'];
$district = $_POST['district'];
$class = $_POST['class'];
$password = $_POST['password'];
$confirm = $_POST['confirm_password'];

if ($password != $confirm) {
    echo "<script>alert('Passwords do not match');history.back();</script>";
    exit();
}

/* Username generation */
$username = strtolower($first[0]) . substr($phone, -4);

/* Password hashing */
$hashed = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users 
(first_name, middle_name, last_name, phone, district, class, username, password)
VALUES 
('$first','$middle','$last','$phone','$district','$class','$username','$hashed')";

if (mysqli_query($conn, $sql)) {
    echo "<script>
        alert('Registration Successful! Your Username is: $username');
        window.location.href='index.html';
    </script>";
} else {
    echo "<script>alert('User already exists');history.back();</script>";
}
?>
