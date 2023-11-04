<?php
session_start();
@include 'xuly.php';

$error = array();

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['name']);  // Updated name attribute
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $user_role = isset($_POST['user_type']) ? $_POST['user_type'] : 'user';  // Set default to 'user' if not provided

    if ($pass != $cpass) {
        $error[] = 'Mật khẩu không khớp';
    } else {
        // Hash the password before storing it
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        $insert = "INSERT INTO account(username, email, password, user_role) VALUES('$username', '$email', '$hashed_password', '$user_role')";
        if (mysqli_query($conn, $insert)) {
            header('location:dangnhap.php');
        } else {
            $error[] = 'Đã xảy ra lỗi trong quá trình đăng ký.';
        }
    }
}
?>

<!-- Your HTML form remains unchanged with the corrected name attributes -->


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Đăng ký</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Đăng ký</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Họ và tên">
      <input type="email" name="email" required placeholder="Địa chỉ email">
      <input type="password" name="password" required placeholder="Mật khẩu">
      <input type="password" name="cpassword" required placeholder="Nhập lại mật khẩu">
      <select name="user_type" style="display: none;">
         <option value="user" checked>user</option> 
         <option value="admin">admin</option>
      </select>
      
      <input type="submit" name="submit" value="Đăng ký " class="form-btn">
      <p>Đã có tài khoản ? <a href="dangnhap.php">Đăng nhập</a></p>
   </form>

</div>

</body>
</html>