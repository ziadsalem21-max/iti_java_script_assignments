<?php
require 'index.php';
require 'home.php';

// إضافة مستخدم جديد
if (isset($_POST['btn-insert'])) {
    $name = trim($_POST['userName']);
    $email = trim($_POST['userEmail']);
    $password = trim($_POST['userPassword']);
    $encryptedPassword = md5($password);

    // التحقق من صحة البيانات
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<div class='alert alert-danger text-center mt-3'>Invalid email format</div>";
    } elseif (strlen($password) < 5) {
        echo "<div class='alert alert-danger text-center mt-3'>Password must be at least 5 characters</div>";
    } else {
        // إدخال البيانات
        $insert = $database->insert("users", [
            "name" => $name,
            "email" => $email,
            "password" => $encryptedPassword
        ]);

        if ($insert) {
            header("Location: allusers.php?message=User added successfully");
            exit();
        } else {
            echo "<div class='alert alert-danger text-center mt-3'>Failed to add user!</div>";
        }
    }
}
?>

<div class="container my-5">
    <h2 class="text-center text-primary mb-4">Add New User</h2>
    <form method="post" class="w-50 mx-auto border p-4 rounded shadow">
        <div class="mb-3">
            <label for="userName" class="form-label">Name</label>
            <input type="text" name="userName" class="form-control" id="userName" required>
        </div>
        <div class="mb-3">
            <label for="userEmail" class="form-label">Email</label>
            <input type="email" name="userEmail" class="form-control" id="userEmail" required>
        </div>
        <div class="mb-3">
            <label for="userPassword" class="form-label">Password</label>
            <input type="password" name="userPassword" class="form-control" id="userPassword" required>
        </div>
        <div class="text-center">
            <button type="submit" name="btn-insert" class="btn btn-success">Insert</button>
            <a href="allusers.php" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>