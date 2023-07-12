<?php session_start(); ?>
<?php include 'isLoggedin.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <h2>Dashboard</h2>
        <span>Welcome, <?php echo $_SESSION['user_name']; ?></span>
        <a href="logout.php">logout</a>
        <ul>
            <li><a href="pending_users.php">Pending Users</a></li>
        </ul>
    </div>
</body>
</html>