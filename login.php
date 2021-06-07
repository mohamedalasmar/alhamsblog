<?php

session_start();
$error = '';
if ($_POST) {

   $email    = htmlspecialchars($_POST['email']);

   $password = htmlspecialchars($_POST['password']);


   $conn = mysqli_connect('localhost', 'root', '', 'blogger') or die('error in connection');

   $query = "select * from users where email = '$email' limit 1 ";


   $result = mysqli_query($conn, $query);

   if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      if (password_verify($password, $row['password'])) {
         $_SESSION['id'] = $row['id'];
         $_SESSION['name'] = $row['name'];
      } else
         $error = 'خطأ في كلمة المرور أو اسم المستخدم';
   } else {
      $error = 'خطأ في كلمة المرور أو اسم المستخدم' . '<br>' . $email;
   }
   if (isset($_SESSION['id'])) {
      header('Location: blogs.php');
   }
}
include('head.php');
?>

<header class="sign-up log-in">
   <div class="bg"> <img class="wave-purple" src="img/background/sign-bg-01.svg" alt=""> </div>
   <div class="sign-up-content">
      <div class="container" style="margin-top: -150px;">
         <div class="row">
            <div class="form-trial col-lg-5 col-md-5 col-sm-8 col-xs-12">
               <div class="logo"> <img class="navbar-brand" src="img/logo/logo-top.png" alt="logo"> </div>
               <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                  <h3>تسجيل الدخول</h3>
                  <div class="name"> <input class="name-input" type="email" name="email" placeholder="اسم المستخدم"> </div>
                  <div class="password"> <input  type="password" name="password" placeholder="كلمة المرور"></div>
                  <p style="color: red;"><?php if (!empty($error)) {
                                             echo $error . '<br><br>';
                                          } ?></p>
                  <div class="submit"> <button class="form-submit" type="submit">دخول</button> </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</header>
</body>

</html>