<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background: url(image/lapt.jpg) no-repeat center center;
            background-size: cover;
        }
        #d2 {
            width: 400px;
            box-shadow: 5px 5px 10px;
            padding: 30px;
            margin: 30px auto;
            color: #fff;
            height: 60vh;
            opacity: 1;
            background-color: black;
            
        }
        .form-control {
            border: 1px solid #6f6d74;
        }
        form button {
            margin-top: 20px;
            background-color: #5712c5;
            color: white;
            padding: 5px;
            border: 0;
            border-radius: 15px;
            width: 100px;
            margin-right: 10px;
        }
        form button:hover {
            box-shadow: 1px 3px 7px 1px gray;
        }
    </style>
</head>
<body>
    <?php 
    $currentPage = 'login';
    include 'header.php'; 
    ?>

    <div id="d2">
        <form method="POST" action="">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
            <br>
            <label for="password" class="form-label">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required>
            <button type="submit" name="login">Login</button>
        </form>
    </div>

    <?php
    session_start();
    include 'db.php';

    if (isset($_POST['login'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];

        $stmt = $conn->prepare('SELECT ID, name, password FROM student WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['ID'];
            $_SESSION['user_name'] = $user['name'];
            header('Location: index.php');
        } else {
            echo '<div class="alert alert-danger" role="alert" style="width: 400px; margin: 15px auto;">Invalid email or password.</div>';
        }
    }
    ?>
</body>
</html>
