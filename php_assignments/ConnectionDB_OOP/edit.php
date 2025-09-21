<?php
require 'index.php';
require 'home.php';

// التحقق من id
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<div class='alert alert-danger text-center mt-5'>No user ID provided!</div>";
    exit();
}

$id = intval($_GET['id']); 

// جلب بيانات المستخدم
$userData = $database->show("users", $id);

if (!$userData) {
    echo "<div class='alert alert-warning text-center mt-5'>User not found!</div>";
    exit();
}

// تحديث البيانات بعد الضغط على الزر
if (isset($_POST['btn-update'])) {
    $name = trim($_POST['userName']);
    $email = trim($_POST['userEmail']);
    $password = trim($_POST['userPassword']);

    // لو الباسورد فاضي → يفضل القديم
    if (!empty($password)) {
        $encryptedPassword = md5($password);
    } else {
        $encryptedPassword = $userData['password'];
    }

    // تحديث البيانات
    $update = $database->update("users", [
        "name" => $name,
        "email" => $email,
        "password" => $encryptedPassword
    ], $id);

    if ($update) {
        header("Location: allusers.php?message=User updated successfully");
        exit();
    } else {
        echo "<div class='alert alert-danger text-center mt-3'>Failed to update user!</div>";
    }
}
?>

<div class="container my-5">
    <h2 class="text-center text-primary mb-4">Update User</h2>
    <form method="post" class="w-50 mx-auto border p-4 rounded shadow">
        <div class="mb-3">
            <label for="userName" class="form-label">Name</label>
            <input type="text" name="userName" class="form-control" id="userName"
                value="<?php echo htmlspecialchars($userData['name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="userEmail" class="form-label">Email</label>
            <input type="email" name="userEmail" class="form-control" id="userEmail"
                value="<?php echo htmlspecialchars($userData['email']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="userPassword" class="form-label">Password</label>
            <input type="password" name="userPassword" class="form-control" id="userPassword"
                placeholder="Leave blank to keep current password">
        </div>
        <div class="text-center">
            <button type="submit" name="btn-update" class="btn btn-success">Update</button>
            <a href="allusers.php" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>