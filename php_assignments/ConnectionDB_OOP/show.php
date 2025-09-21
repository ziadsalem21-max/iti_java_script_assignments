<?php
require 'index.php';
require 'home.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<div class='alert alert-danger text-center w-50 mx-auto mt-5'>No user ID provided!</div>";
    exit();
}

$id = intval($_GET['id']); // لتأمين الإدخال
$userData = $database->show("users", $id);

if (!$userData) {
    echo "<div class='alert alert-warning text-center w-50 mx-auto mt-5'>User not found!</div>";
    exit();
}
?>

<div class="container my-5">
    <h2 class="text-center mb-4 text-primary">User Details</h2>
    <table class="table table-bordered w-50 mx-auto text-center shadow">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo htmlspecialchars($userData['name']); ?></td>
                <td><?php echo htmlspecialchars($userData['email']); ?></td>
                <td>
                    <a href="update.php?id=<?php echo $userData['id']; ?>" class="btn btn-warning mx-1">Update</a>
                    <a href="delete.php?id=<?php echo $userData['id']; ?>" class="btn btn-danger mx-1"
                        onclick="return confirm('Are you sure you want to delete this user?');">
                        Delete
                    </a>
                    <a href="allusers.php" class="btn btn-info mx-1">Back</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>