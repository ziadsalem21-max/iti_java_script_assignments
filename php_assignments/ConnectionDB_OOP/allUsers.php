<?php
require 'index.php';
require 'home.php';

// استرجاع كل المستخدمين
$allUsersData = $database->index("users");

echo "<div class='container my-5'>";
echo "<h2 class='text-center mb-4'>All Users</h2>";
echo "<table class='table table-bordered table-striped w-75 mx-auto text-center'>";

echo "<thead class='table-dark'>";
echo "<tr>";
echo "<th>Name</th>";
echo "<th>Email</th>";
echo "<th>Actions</th>";
echo "</tr>";
echo "</thead>";

echo "<tbody>";
foreach ($allUsersData as $user) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($user['name']) . "</td>";
    echo "<td>" . htmlspecialchars($user['email']) . "</td>";
    echo "<td>";
    echo "<a href='show.php?id=" . $user['id'] . "' class='btn btn-warning btn-sm me-1'>Show</a>";
    echo "<a href='update.php?id=" . $user['id'] . "' class='btn btn-primary btn-sm me-1'>Update</a>";
    echo "<a href='delete.php?id=" . $user['id'] . "' class='btn btn-danger btn-sm' 
             onclick=\"return confirm('Are you sure you want to delete this user?');\">Delete</a>";
    echo "</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
echo "</div>";
?>