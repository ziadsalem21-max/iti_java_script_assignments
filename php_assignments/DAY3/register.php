<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التسجيل</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1 class="text-info text-center my-4">صفحة التسجيل</h1>

    <?php
  if (isset($_GET['error'])) {
    echo '<div class="alert alert-danger w-75 m-auto text-center">' . htmlspecialchars($_GET['error']) . '</div>';
  }
  if (isset($_GET['message'])) {
    echo '<div class="alert alert-success w-75 m-auto text-center">' . htmlspecialchars($_GET['message']) . '</div>';
  }
  ?>

    <form enctype="multipart/form-data" action="server.php" method="post"
        class="my-5 mx-auto p-5 border border-2 rounded w-50 shadow-lg bg-light">

        <div class="mb-3">
            <label class="form-label">الاسم</label>
            <input name="userName" type="text" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">الإيميل</label>
            <input name="userEmail" type="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">الصورة</label>
            <input name="userImage" type="file" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">كلمة المرور</label>
            <input name="userPassword" type="password" class="form-control" required minlength="6">
        </div>

        <button name="btn-register" type="submit" class="btn btn-primary w-100">تسجيل</button>
    </form>
</body>

</html>