<?php include 'connection.php' ?>
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
        <h2>Register</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="cnf_password" class="form-control" id="">
            </div>
            <div class="form-group">
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="Teacher" name="role">Teacher
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="Student" name="role">Student
                    </label>
                </div>                  
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="btnRegister">Register</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php 
    if(isset($_POST['btnRegister'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['cnf_password'];
        $role = $_POST['role'];
        if($password == $confirm){
            $password = md5($password);
            $s = "Insert into users(name, email, password, role) 
                  values ('".$name."','".$email."', '".$password."','".$role."')";
            if(mysqli_query($conn, $s)){
                echo 'User Registered. Pending for approval.';
            }
        }

    }
?>