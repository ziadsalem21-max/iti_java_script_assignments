<?php
require 'index.php';
session_destroy();
header("Location: login.php?message=You have logged out successfully");
exit();
?>