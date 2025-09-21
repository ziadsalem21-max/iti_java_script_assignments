<?php
require 'index.php';

if (isset($_POST['btn-register'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
     $encryptedPassword = md5($password);
    if (!preg_match('/^[0-9]{5,15}$/', $password)) {
        header("Location: register.php?error=Password must be 5–15 digits only");
        exit();
    }

    // $encrypted = '';
    // for ($i = 0; $i < strlen($password); $i++) {
    //     $digit = intval($password[$i]);
    //     $encrypted .= ($digit + 5) % 15;
    // }
    $stmt = $connection->prepare("INSERT INTO users (username,email,password) VALUES (?,?,?)");
    $stmt->execute([$username, $email, $encryptedPassword]);

    header("Location: login.php?message=Registration successful");
    exit();
}

if (isset($_POST['btn-login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
       $encryptedPassword= md5($password);
    if (!preg_match('/^[0-9]{5,15}$/', $password)) {
        header("Location: login.php?error=Invalid password format (5–15 digits required)");
        exit();
    }
 

    $stmt = $connection->prepare("SELECT * FROM users WHERE email=? AND password=?");
    $stmt->execute([$email, $encryptedPassword]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['login_id'] = $user['id'];
        header("Location: home.php");
        exit();
    } else {
        header("Location: login.php?error=Invalid email or password");
        exit();
    }
}

if (isset($_GET['delete'])) {
    $id = $_SESSION['login_id'];
    $stmt = $connection->prepare("DELETE FROM users WHERE id=?");
    $stmt->execute([$id]);

    session_destroy();
    header("Location: register.php?message=Account deleted successfully");
    exit();
}