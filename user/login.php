<?php
include "db.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Invalid request");
}
if (isset($_POST['username'])) {
    $username = $_POST['username'];
} else {
    $username = '';
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
} else {
    $password = '';
}


$sql = "SELECT username, password, class FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {

    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row['password'])) {

        $_SESSION['username'] = $row['username'];
        $_SESSION['class']    = $row['class'];

        switch ($row['class']) {
            case "10":
                header("Location: class10.php");
                break;
            case "11":
                header("Location: class11.php");
                break;
            case "12":
                header("Location: class12.php");
                break;
        }
        exit();

    } else {
        echo "<script>alert('Wrong password');history.back();</script>";
    }

} else {
    echo "<script>alert('User not found');history.back();</script>";
}
?>
