<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1 class="text-info text-center my-4">User Registration</h1>

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

    <form enctype="multipart/form-data" action="AuthController.php" method="post"
        class="my-5 mx-auto p-4 border border-2 rounded w-50 shadow">
        <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Name</label>
            <input name="userName" type="text" class="form-control" id="exampleInputName1" placeholder="Enter Name"
                required>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="userEmail" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"
                required>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="userPassword" type="password" class="form-control" id="exampleInputPassword1"
                placeholder="Password" required>
            <small class="form-text text-muted">Password must be 5-15 digits.</small>
        </div>

        <button name="btn-register" type="submit" class="btn btn-primary w-100">Register</button>
    </form>
</body>

</html>