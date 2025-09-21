<?php
session_start();
require_once "index.php";

class AuthController {
    private $db;

    public function __construct() {
        $database = new DB("iti_sm_php_g2_2025", "mysql", "root", "", "localhost");
        $this->db = $database->getConnection();
    }

    // Register
    public function register($name, $email, $password) {
        // Validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: register.php?error=Invalid Email");
            exit();
        }

        if (!preg_match("/^[a-zA-Z]{3,}$/", $name)) {
            header("Location: register.php?error=Invalid Name");
            exit();
        }

        if (!preg_match("/^[0-9]{5,15}$/", $password)) {
            header("Location: register.php?error=Password must be 5-15 digits");
            exit();
        }

        $encryptedPassword = md5($password);

        // Check if user exists
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            header("Location: register.php?error=User already exists");
            exit();
        }

        // Insert new user
        $stmt = $this->db->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
        if ($stmt->execute([$name, $email, $encryptedPassword])) {
            header("Location: login.php?message=Registration successful");
            exit();
        }
    }

    // Login
    public function login($email, $password) {
        $encryptedPassword = md5($password);
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $user['password'] === $encryptedPassword) {
            $_SESSION['login_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header("Location: profile.php?message=Login successful");
            exit();
        } else {
            header("Location: login.php?error=Invalid email or password");
            exit();
        }
    }
}

// Handle Requests
$auth = new AuthController();

if (isset($_POST['btn-register'])) {
    $auth->register($_POST['userName'], $_POST['userEmail'], $_POST['userPassword']);
}

if (isset($_POST['btn-login'])) {
    $auth->login($_POST['userEmail'], $_POST['userPassword']);
}