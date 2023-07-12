<?php include '../connection.php'; ?>
<?php 
    $s = "select t.id, t.name, t.email, t.salary,t.birth_date, d.name as dept_name from teachers as t 
            inner join departments as d on t.department_id=d.id";
    $q = mysqli_query($conn, $s);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
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
        <h2>All Teachers</h2>
        <table class="table table-striped">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Salary</th>
                <th>Date of Birth</th>
                <th>Department</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php 
                    while($r = mysqli_fetch_array($q)){ ?>
                        <tr>
                            <td><?php echo $r['id'] ?></td>
                            <td><?php echo $r['name'] ?></td>
                            <td><?php echo $r['email'] ?></td>
                            <td><?php echo $r['salary'] ?></td>
                            <td><?php echo $r['birth_date'] ?></td>
                            <td><?php echo $r['dept_name'] ?></td>
                            <td>
                                <a class="btn btn-secondary" href="edit_department.php?dept_id=<?php echo $r['id'] ?>">Edit</a>
                                <a class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $r['id'] ?>" >Delete</a>
                                <div class="modal" id="myModal<?php echo $r['id'] ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete Confirmation</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            Are you sure you want to delete <?php echo $r['name'] ?>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="delete_dept.php?dept_id=<?php echo $r['id'] ?>" class="btn btn-danger">Yes</a>
                                        </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php }
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>