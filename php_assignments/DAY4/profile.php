<?php 
require 'index.php';
if (!isset($_SESSION['login_id'])) {
    header("Location: login.php?error=Please login first");
    exit();
}
$user_id = $_SESSION['login_id'];
$user = $connection->query("SELECT * FROM users WHERE id=$user_id")->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow p-4">
            <h3 class="text-center text-info mb-3">Your Profile</h3>
            <table class="table table-striped text-center">
                <tr>
                    <th>ID</th>
                    <td><?= $user['id']; ?></td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td><?= $user['username']; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= $user['email']; ?></td>
                </tr>
            </table>
            <div class="text-center mt-3">
                <a href="server.php?delete=1" class="btn btn-danger">Delete Account</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>