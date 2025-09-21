<?php
session_start(); // بدء السيشن

// مسح جميع بيانات السيشن
session_unset();
session_destroy();

// رجوع لصفحة تسجيل الدخول
header("Location: login.php?message=logged_out");
exit();
?>