<?php
session_start();
require 'index.php';
require 'home.php';

// التأكد إن المستخدم عامل تسجيل دخول
if (!isset($_SESSION['login_id'])) {
    header("Location: login.php?error=You must login first");
    exit();
}

$id = $_SESSION['login_id'];

// جلب بيانات المستخدم من قاعدة البيانات
$userData = $database->show("users", $id);
?>

<div class="container my-5">
    <h2 class="text-center text-primary mb-4">Profile Page</h2>

    <table class="table table-bordered w-50 mx-auto text-center">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $userData['name'] ?></td>
                <td><?= $userData['email'] ?></td>
                <td>
                    <a href="update.php?id=<?= $userData['id'] ?>" class="btn btn-warning mx-1">Update</a>
                    <a href="delete.php?id=<?= $userData['id'] ?>" class="btn btn-danger mx-1">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>