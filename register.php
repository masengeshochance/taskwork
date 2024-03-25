<?php
include 'connect.php';
if(isset($_POST['save'])){
    $id=$_POST['id'];
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $pass=md5($_POST['password']);
    $cpass=md5($_POST['cpassword']);

    $select="SELECT * FROM student WHERE email='$email' && password='$pass' ";
    $res=mysqli_query($conn,$select);

    if(mysqli_num_rows($res) > 0 ){
        $error[]= 'User already exist!';
    }else{
        if($pass != $cpass){
            $error[]= 'Password not match!';
        }else{
            $insert= "INSERT INTO student VALUES('$id','$name','$email','$pass','$cpass')";
            mysqli_query($conn,$insert);
            header("location:login.php");
        };
    };
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="POST">
        <h1>Sign up here</h1>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>
        <label>Names</label>
        <input type="text" name="name" placeholder="Enter full name" required><br>
        <label>Email</label>
        <input type="text" name="email" placeholder="Enter email" required><br>
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password" required><br>
        <label>Comfirm password</label>
        <input type="password" name="cpassword" placeholder="comfirm your password" required><br>
        <button type="submit" name="save">Sign Up</button>
        <h3>Already have an account? <span><a href="login.php">Login</a></span></h3>
    </form>
    
</body>
</html>