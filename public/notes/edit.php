<!DOCTYPE html>
<?php
session_start();
include('dbcon.php');
include ("query.php");
$obj=new query();
$id= $_SESSION['sessid'];
$table='userreg';
$result=$obj->viewData($table,$id);
$row=mysqli_fetch_array($result);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Exam registeration</title>
</head>
<body style="background-color: lightgreen;">
<header>
        <h1 style="padding: 3%; background-color: rgb(67, 66, 68); color: rgb(240, 236, 236); text-align: center;background-size: 25%; ">
            HOME </h1>
            <nav class="navbar navbar-expand-sm btn-dark">
            <ul class="navbar-nav active">
                <li class="nav-itemactive">
                    <a class="nav-link" href="userhome.php">Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="edit.php">Edit Profile</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="viewstatus.php">View Status</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </nav>
    </header>
<div class="container">
            <div>
                <form action="" method="post" id="form">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" name="name"class="form-control" value="<?php echo $row['name']; ?>" >
                    </div>
                    <div>
                        <label for="date">DOB</label>
                        <input type=date name="dob" class="form-control" value="<?php echo $row['dob']; ?>">
                    </div>
                    <div>
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control"><?php echo $row['address']; ?></textarea>
                    </div>
                    <div>
                        <label for="gender">Gender</label>
                        <input type="radio" name="gender"checked=<?php if($row['gender'] = "male") { echo "true"; }?> value="male"> Male
                        <input type="radio" name="gender" checked=<?php if($row['gender'] = "female") { echo "true"; }?>value="female"> Female
                    </div>
                    <div>
                        <label for="phno">phone number</label>
                        <input type="number" name="phno" class="form-control" value="<?php echo $row['phno']; ?>">
                    </div>
                    <div>
                        <label for="course">course</label>
                        <input type="text" name="course" class="form-control"  value="<?php echo $row['course']; ?>">
                    </div>
                    <div>
                        <label for="regno">Register number</label>
                        <input type="number" name="regno" class="form-control" value="<?php echo $row['regno']; ?>" >
                    </div>
                    <div>
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" >
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" value="<?php echo $row['password']; ?>" >
                    </div>
                    <div style="padding-top:5%">
                        <input type="submit" value="submit" name="submit" class="btn btn-danger btn-block">
                        <input type="reset" value="clear" class="btn btn-primary btn-block">
                    </div>
                </form>
            </div>
        </div>
</div>   
</body>
<?php
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $dob=$_POST['dob'];
    $address=$_POST['address'];
    $gender=$_POST['gender'];
    $phno=$_POST['phno'];
    $course=$_POST['course'];
    $regno=$_POST['regno'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $field="name='$name',dob='$dob',address='$address',gender='$gender',phno='$phno',course='$course',regno='$regno',username='$username',password='$password'";
    $obj->editData($table,$field,$id);
    header("location:userhome.php");
}
?>
</html>