<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autentificare</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-box {
            width: 25%;
            padding: 30px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 10px;
        }
        @media (max-width: 768px) {
        .login-box {
            width: 90%;
        }
    }
    </style>
</head>
<body class="bg-light">

    <div class="login-box">
        <h2 class="text-center mb-4">Autentificare</h2>
        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-warning">Login</button> <!-- Warning-colored button -->
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
