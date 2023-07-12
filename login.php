<?php include 'connection.php' ?>
<?php session_start(); ?>
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
        <h2>Login</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" id="">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="btnLogin">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php 
    if(isset($_POST['btnLogin'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);    
        $s = "Select * from users where email='".$email."' 
              AND password='".$password."'";
        $q = mysqli_query($conn, $s);
        $row = mysqli_fetch_assoc($q);
        if($row){
            $is_approved = $row['status'];
            if($is_approved){
                $_SESSION['user_name'] = $row['name'];
                header('Location: dashboard.php');
            }
            else{
                echo 'Not Approved';
            }
        }

    }
?>