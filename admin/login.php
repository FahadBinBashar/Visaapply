<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 400px;
            width: 100%;
        }

        .logo {
            text-align: center;
            padding: 20px;
        }

        .logo img {
            max-width: 100px;
        }

        .form-container {
            padding: 20px;
        }

        .form-container h2 {
            color: #e51b20;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin: 10px 0;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: #333;
        }

        .form-group input {
            width: 94%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-group button {
            width: 100%;
            background-color: #e51b20;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 12px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #f0a506;
        }

        .form-group p {
            text-align: center;
            margin-top: 10px;
        }

        .switch-container {
            text-align: center;
            margin-top: 20px;
        }

        .switch-container a {
            text-decoration: none;
            color: #e51b20;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="img/logoEsHayat.png" alt="EsHayat Logo">
        </div>
        <div class="form-container">
            <h2>Admin Sign In</h2>
            <form id="login-form" action="Actions/signin.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit">Sign In</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
