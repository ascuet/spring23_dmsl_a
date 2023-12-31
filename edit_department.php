<?php include 'connection.php'; ?>
<?php 
    $department_id = $_REQUEST['dept_id'];
    $s = "select * from departments where id=$department_id";
    $q = mysqli_query($conn, $s);
    $r = mysqli_fetch_assoc($q);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Department</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div>
            <ul>
                <li><a href="index.php">Create Department</a></li>
                <li><a href="departments.php">All Departments</a></li>
            </ul>
        </div>
        <h2>Edit Department</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" value="<?php echo $r['name'] ?>" class="form-control" name="name" id="">
            </div>
            <div class="form-group">
                <label for="">Short Name</label>
                <input type="text" value="<?php echo $r['short_name'] ?>" class="form-control" name="short_name" id="">
            </div>
            <div class="form-group">
                <label for="">Established</label>
                <input type="date" value="<?php echo $r['established_at'] ?>" class="form-control" name="estAt" id="">
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="submitBtn">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php 
    if(isset($_POST['submitBtn'])){
        $dept_name = $_POST['name'];
        $dept_short_name = $_POST['short_name'];
        $dept_estAt = $_POST['estAt'];
        $str = "update departments set name='".$dept_name."', short_name='".$dept_short_name."', 
                established_at='".$dept_estAt."' where id= $department_id";
        // convert this string to query
        if(mysqli_query($conn, $str)){
           header('Location: departments.php');
        }
    }
?>