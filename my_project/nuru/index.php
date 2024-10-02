<?php
session_start();
include 'db.php';

$stmt = $conn->query("SELECT ID, name, email FROM student"); 
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
            background: url(image/office.jpg) no-repeat center center fixed;
            background-size: cover;
            background-color: #c4c4c4;
           
        }
        table a {
            text-decoration: none;
            color: gold;
        }
        .container {
            margin-top: 30px;
            background-color: white;
            padding: 30px !important;
        }
        .table {
            width: fit-content;
            margin-top: 18px;
        }
        table button {
            padding: 5px;
            border: 0;
            border-radius: 15px;
            width: 80px;
        }
        table button:hover {
            box-shadow: 1px 2px 10px 2px #b9b9b9;
        }
        .edit {
            background-color: #b16cb1;
            margin-right: 10px;
        }
        .delete {
            background-color: #e83e8c;
        }
        body {
            background-color: #c4c4c4 !important;
        }
        th {
            background-color: #343a40 !important;
            color: white !important;
        }
        img{
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <?php 
    $currentPage = 'home';
    include 'header.php'; 
    ?>

    <div class="container">
        <?php if (isset($_SESSION['user_id'])): ?>
            <h2>All students</h2>
            <table class="table table-bordered">
                <tr id="r1" align='center'>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($data as $record): ?>
                <tr>
                    <td valign="middle" align='center' style="width: 100px"><?php echo $record['ID']; ?></td>
                    <td valign="middle" align='center' style="width: 150px"><?php echo $record['name']; ?></td>
                    <td valign="middle" align='center' style="width: 250px"><?php echo $record['email']; ?></td>
                    <td valign="middle" align='center' style="width: 200px">
                        <button class="edit"><a href="edit.php?id=<?php echo $record['ID']?>">Edit</a></button>
                        <button class="delete"><a href="delete.php?id=<?php echo $record['ID']?>">Delete</a></button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <div class="alert alert-info" role="alert" style="width: 400px; margin: 15px auto;">
                Please <a href="login.php">login</a> or <a href="register.php">register now</a> to view the content.
                <img src="image/stbook4.jpg" alt="">
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
