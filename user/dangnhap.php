<?php
session_start();
@include 'xuly.php';

$error = array();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['password'];

    $select = "SELECT * FROM account WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $hashed_password = $row['password'];

        if (password_verify($pass, $hashed_password)) {
            if (isset($row['user_role'])) {
                if ($row['user_role'] == 'admin') {
                    $_SESSION['email'] = $row['email'];
                    header('location:..\admin\dashboard.php');
                } elseif ($row['user_role'] == 'user') {
                    $_SESSION['user_name'] = $row['username'];
                    header('location:../application/index.php');
                }
            } else {
                $error[] = 'User role is not defined for this account.';
            }
        } else {
            $error[] = 'Email hoặc mật khẩu không chính xác';
        }
    } else {
        $error[] = 'Email hoặc mật khẩu không chính xác';
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
   <title>Đăng nhập</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Đăng nhập</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Địa chỉ email">
      <input type="password" name="password" required placeholder="Mật khẩu">
      <a href="quenmatkhau.php">Quên mật khẩu?</a>
      <input type="submit" name="submit" value="Đăng nhập" class="form-btn">
      
      <p>Chưa có tài khoản ? <a href="dangky.php">Đăng kí ngay</a></p>

   </form>

</div>

</body>
</html>