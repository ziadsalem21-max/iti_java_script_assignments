<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1 class="text-info text-center my-4">User Login</h1>

    <?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger w-50 m-auto text-center">
        <?= htmlspecialchars($_GET['error']); ?>
    </div>
    <?php endif; ?>

    <?php if (isset($_GET['message'])): ?>
    <div class="alert alert-success w-50 m-auto text-center">
        <?= htmlspecialchars($_GET['message']); ?>
    </div>
    <?php endif; ?>

    <form action="AuthController.php" method="post" class="mx-auto my-5 p-4 border border-2 rounded w-50 shadow">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="userEmail" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"
                required>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="userPassword" type="password" class="form-control" id="exampleInputPassword1"
                placeholder="Password" required>
        </div>

        <button name="btn-login" type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</body>

</html>