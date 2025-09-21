<?php
session_start();

if (isset($_POST['btn-register'])) {
    $name = htmlspecialchars(trim($_POST['userName']));
    $email = htmlspecialchars(trim($_POST['userEmail']));
    $password = $_POST['userPassword'];
    $image = $_FILES['userImage'];

    // إنشاء مجلد الصور إذا مش موجود
    if (!is_dir("images")) {
        mkdir("images");
    }

    // امتدادات وصيغ مسموح بها
    $validExtensions = ['png', 'gif', 'jpg', 'jpeg'];
    $extension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
    if (!in_array($extension, $validExtensions)) {
        header("Location: register.php?error=امتداد الصورة غير مسموح");
        exit;
    }

    $imageType = mime_content_type($image['tmp_name']);
    $allowedTypes = ['image/png', 'image/jpeg', 'image/gif'];
    if (!in_array($imageType, $allowedTypes)) {
        header("Location: register.php?error=نوع الصورة غير صالح");
        exit;
    }

    if ($image['size'] > 2 * 1024 * 1024) {
        header("Location: register.php?error=حجم الصورة أكبر من 2 ميجا");
        exit;
    }

    // اسم جديد للصورة
    $newImage = time() . "." . $extension;
    if (!move_uploaded_file($image['tmp_name'], "images/" . $newImage)) {
        header("Location: register.php?error=فشل في رفع الصورة");
        exit;
    }

    // تجهيز بيانات المستخدم
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $userData = [
        "name" => $name,
        "email" => $email,
        "password" => $hashedPassword,
        "image" => $newImage
    ];

    // كتابة البيانات في data.json
    if (!file_exists("data.json")) {
        file_put_contents("data.json", json_encode([$userData], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    } else {
        $currenData = file_get_contents("data.json");
        $decodedData = json_decode($currenData, true);

        foreach ($decodedData as $user) {
            if ($user['email'] === $email) {
                header("Location: register.php?error=الإيميل مسجل بالفعل");
                exit;
            }
        }

        $decodedData[] = $userData;
        file_put_contents("data.json", json_encode($decodedData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    header("Location: register.php?message=تم التسجيل بنجاح");
    exit();
}

if (isset($_POST['btn-login'])) {
    $email = htmlspecialchars(trim($_POST['userEmail']));
    $password = $_POST['userPassword'];

    if (file_exists("data.json")) {
        $users = json_decode(file_get_contents("data.json"), true);

        foreach ($users as $user) {
            if ($user['email'] === $email && password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    "name" => $user['name'],
                    "email" => $user['email'],
                    "image" => $user['image']
                ];
                header("Location:portfolio.php?message=مرحبا بك");
                exit;
            }
        }

        header("Location: login.php?error=بيانات الدخول غير صحيحة");
        exit;
    } else {
        header("Location: login.php?error=لا يوجد مستخدمين بعد");
        exit;
    }
}