<?php
if (!isset($_GET['email'])) {
    die("خطأ: لم يتم تحديد المستخدم");
}

$email = $_GET['email'];

if (!file_exists("data.json")) {
    die("لا يوجد بيانات مسجلة");
}

$users = json_decode(file_get_contents("data.json"), true);
$userData = null;

foreach ($users as $user) {
    if ($user['email'] === $email) {
        $userData = $user;
        break;
    }
}

if (!$userData) {
    die("المستخدم غير موجود");
}

$name = $userData['name'];
$image = $userData['image'];
$profileImage = "images/" . htmlspecialchars($image);
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <title>بورتفوليو</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background: linear-gradient(135deg, #e53935, #e35d5b);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Cairo', sans-serif;
    }

    .card {
        border-radius: 20px;
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
        background: #fff;
    }

    .profile-img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border: 5px solid #fff;
        border-radius: 50%;
        margin-top: -75px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card text-center p-4">
                    <div class="card-body">
                        <img src="<?= $profileImage ?>" alt="Profile Image" class="profile-img shadow">
                        <h2 class="mt-3"><?= htmlspecialchars($name) ?></h2>
                        <p class="text-muted"><?= htmlspecialchars($email) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>