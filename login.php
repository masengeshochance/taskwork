<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<style>
    *{
    margin: 0;
    padding: 0;
}
body{
    background-image: url(img/2.jpg);
    background-size: cover;
}
form{
    width: 200px;
    height: 250px;
    background-color: black;
    margin: 20px 440px;
    padding: 30px 90px;
    border-radius: 5px;

}
form h1{
    color: rgb(224, 82, 11);
    text-align: center;
    text-transform: uppercase;
    font-size: 20px;
    
}
form label{
    color: white;
    font-size: 20px;
    text-transform: capitalize;
    margin:15px 0;
    display: inline-block;
}
form input{
    font-size: 15px;
    color: white;
    background-color: transparent;
    border: 1px solid rgb(224, 82, 11);
    border-top: none;
    border-left: none;
    border-right: none;
}
form input:focus{
    outline: none;
}
form button{
    width: 50%;
    height: 20px;
    text-align: center;
    background: rgb(224, 82, 11);
    text-transform: capitalize;
    font-size: 15px;
    border-radius: 5px;
    margin: 20px;
    cursor: pointer;
    border: 1px solid rgb(224, 82, 11);
}
form h3{
    color: white;
}
form h3 span{
    width: 50%;
    height: 20px;
    text-align: center;
    background: rgb(224, 82, 11);
    text-transform: capitalize;
    font-size: 15px;
    margin: 20px;
    cursor: pointer;
    border: 1px solid rgb(224, 82, 11);
    color: black;
    border-radius: 5px;
    margin-left: 50px;
}
form h3 span a{
    text-decoration: none;
    color: black;
}
</style>
<body>
    <form action="" method="POST">
        <h1>Log In</h1>
        <label>Username</label>
        <input type="text" placeholder="Enter username"><br>
        <label>Password</label>
        <input type="password" placeholder="Enter password"><br>
        <button>Log in</button>
        <h3>Don't have an account?<span><a href="register.php">Register</a></span></h3>
    </form>
    <?php
    session_start();
    include 'connect.php';
    if(isset($_POST['save'])){
       
        $name=mysqli_real_escape_string($conn,$_POST['name']);
        $pass=md5($_POST['password']);
        
        $select="SELECT * FROM student WHERE name='$name' && password='$pass' ";
        $res=mysqli_query($conn,$select);
        $data=mysqli_fetch_array($res);
        if (is_array($data)) {
            $_SESSION['name']=$data['name'];
            $_SESSION['password']=$data['password'];

            header("location:dashboard.php");
        }
        else {
            header("location:login.php");
        };
    };   
    
    ?>
    
</body>
</html>