<?php include '../connection.php'; ?>
<?php 
    $s = "Select * from departments";
    $q = mysqli_query($conn, $s);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Teacher</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div>
            <ul>
                <li><a href="index.php">Create Department</a></li>
                <li><a href="departments.php">All Departments</a></li>
                <li><a href="teacher/create.php">Create Teacher</a></li>
                <li><a href="teacher/all.php">All Teachers</a></li>
            </ul>
        </div>
        <h2>Create Teacher</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" id="">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" id="">
            </div>
            <div class="form-group">
                <label for="">Salary</label>
                <input type="number" class="form-control" name="salary" id="">
            </div>
            <div class="form-group">
                <label for="">Birth Date</label>
                <input type="date" class="form-control" name="dob" id="">
            </div>
            
            <div class="form-group">
                <label for="">Department</label>
                <select name="department" id="" class="form-control">
                    <option value="">Select Department</option>
                    <?php 
                        while($row = mysqli_fetch_assoc($q)){ ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                        <?php  }
                    ?>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="submitBtn">Save</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php 
    if(isset($_POST['submitBtn'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $salary = $_POST['salary'];
        $birth_date = $_POST['dob'];
        $dept = $_POST['department'];
        $str = "INSERT INTO teachers(name, email, salary, birth_date, department_id)
                 VALUES ('".$name."', '".$email."', $salary, '".$birth_date."', $dept)";
        // convert this string to query
        if(mysqli_query($conn, $str)){
            echo 'Successfully Inserted';
        }
    }
?>