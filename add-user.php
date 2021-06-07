<?php 
session_start();
// if(!$_SESSION['id']){
// header("Location: login.php");
// }
include('head.php');
include('nav.php');
if($_POST){
    $error = '';
    $message = '';
    $user_id = $_SESSION['id'];
    $user = htmlspecialchars($_POST['name']);
    $password = htmlspecialchars($_POST['password']);
    $email = htmlspecialchars($_POST['email']);

    if(empty($user)||empty($password)||empty($email)){
    $error = "خطأ في إضافة مستخدم الى  المدونة";
    }
    else{
        $query = "insert into users (id,name, password , email) 
        values( id ,'$user','$password','$email')";
    }
    if(mysqli_query($conn, $query)){
        $message = "تم إضافة المستخدم بنجاح";
    }else{
        $error = "لم يتم إضافة المستخدم  ".mysqli_error($conn);
    }
}
?>
<section class="download section-padding" style="height: 500px !important; ">
         <div class="container">
            <div class="row">
               <div class="mock-float col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                  <br><br><br><br><br><br><br>
                  <div class="site-intro-content" style="color: white !important;">
                     <h2 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s" style="color: white; visibility: visible; animation-duration: 1s; animation-delay: 0s; animation-name: fadeInUp;">
                        أهلًا بك <?php echo $_SESSION['name']; ?> 
                     </h2>
                     <ul class="list-inline list-unstyled header-links wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-name: fadeInUp;">
                        <li>
                           <a style="color: white !important;" href="/">
                           الرئيسية / 
                           </a>
                        </li>
                        <li>
                           <span>
                           إضافة مستخدم
                           </span>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="explain section-padding">
         <div class="container">
            <div class="row">
               <?php 
                include('side.php');
                if(!empty($message)){
                    echo "<p style='color: green; padding:10px; background-color: #b1f69f'>$message</p>";
                }if(!empty($error)){
                    echo "<p style='color: red; padding:10px; background-color: #f6a69f'>$error</p>";
                }
                ?>
                <center>
               <div class="col-lg-10 col-md-5 col-sm-12 col-xs-12">
                  <div class="col-md-12">
                  <form action="#" method="post" enctype="multipart/form-data">
                        <h2>إضافة مستخدم</h2>
                        <div class="name">
                           <input type="text" name="name" placeholder="اسم المستخدم" required style="width:50%;text-align:center;"> 
                        </div>
                        <br>
                        <div class="name">
                        <input type="password" name="password" placeholder="كلمة السر" required style="width:50%;text-align:center;"> 
                        </div>
                        <div class="name">
                           <input type="email" name="email" placeholder="البريد الالكتروني" required style="width:50%;text-align:center;"> 
                        </div>
                        <br>
                        <div class="submit">
                           <button class="form-submit" name="submit">حفظ</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            </center>
         </div>
      </section>
<?php
include('footer.php');
?>