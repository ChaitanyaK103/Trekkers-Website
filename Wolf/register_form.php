<?php
@include 'config.php';
if(isset($_POST['submit'])){

    $First_Name = ( $_POST['First Name']);
    $Last_Name = ( $_POST['Last Name']);
    $User_Name = ( $_POST['User Name']);
    $Contact = ( $_POST['Contact']);
    $Email = ( $_POST['Email']);
    $Gender = ( $_POST['Gender']);
    $Password = md5($_POST['Password']);
    $Confirm_Password = md5($_POST['Confirm Password']);
    $User_type = $_POST['User_type'];
 
    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
 
    $result = mysqli_query($conn, $select);
 
    if(mysqli_num_rows($result) > 0){
 
       $error[] = 'user already exist!';
 
    }else{
 
       if($pass != $cpass){
          $error[] = 'password not matched!';
       }else{
          $insert = "INSERT INTO user_form(First_Name, Last_Name, User_Name, Contact, Email, Gender, Password, User_type) 
          VALUES('$First_Name', '$Last_Name', '$User_Name', '$Contact', '$Email', '$Gender', '$Password', '$User_type')";
          mysqli_query($conn, $insert);
          header('location:login_form.php');
       }
    }
 
 };
?>


<!DOCTYPE html>
<html>
<head>
    <title>Register-form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <form action="register_form.php" method="post">
            <h3>register now</h3>
            <input type="text" placeholder="First Name">
            <input type="text" placeholder="Last Name">
            <input type="text" placeholder="User Name">
            <input type="number" placeholder="Contact">
            <input type="email" placeholder="Email">
            <input type="text" placeholder="Gender">
            <input type="password" placeholder="Password">
            <input type="password" placeholder="Confirm Password">
            <select name="User_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>Already have an account ?<a href="login_form.php">Login now</a></p>
        </form>
    </div>
    </div>
</body>
</html>

