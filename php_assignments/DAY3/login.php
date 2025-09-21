<?php
if (isset($_POST['btn-login'])) {
    $email = htmlspecialchars(trim($_POST['userEmail']));
    $password = $_POST['userPassword'];

    if (file_exists("data.json")) {
        $users = json_decode(file_get_contents("data.json"), true);

        foreach ($users as $user) {
            if ($user['email'] === $email && password_verify($password, $user['password'])) {
                // بدل السيشن → نوجه للداشبورد مع الإيميل
                header("Location:portfolio.php?email=" . urlencode($email));
                exit;
            }
        }

        $error = "بيانات الدخول غير صحيحة";
    } else {
        $error = "لا يوجد مستخدمين بعد";
    }
}
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1 class="text-info text-center my-4">صفحة تسجيل الدخول</h1>

    <?php if (!empty($error)) : ?>
    <div class="alert alert-danger w-75 m-auto text-center"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post" class="my-5 mx-auto p-5 border border-2 rounded w-50 shadow-lg bg-light">
        <div class="mb-3">
            <label class="form-label">الإيميل</label>
            <input name="userEmail" type="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">كلمة المرور</label>
            <input name="userPassword" type="password" class="form-control" required minlength="6">
        </div>
        <button name="btn-login" type="submit" class="btn btn-primary w-100">دخول</button>
    </form>
</body>

</html>