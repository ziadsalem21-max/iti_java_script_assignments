<?php
require 'index.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // حذف المستخدم من قاعدة البيانات
    $delete = $database->delete("users", $id);

    if ($delete) {
        header("Location: allusers.php?message=User deleted successfully");
        exit();
    } else {
        header("Location: allusers.php?error=Failed to delete user");
        exit();
    }
} else {
    header("Location: allusers.php?error=Invalid request");
    exit();
}