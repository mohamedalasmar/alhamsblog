<?php 
session_start();

if(!$_SESSION['id']){
    header("Location: login.php");
}
include('head.php');
include('nav.php');
if($_POST){
$erorr = '';
$message = '';
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$subject = htmlspecialchars($_POST['subject']);
$detail = htmlspecialchars($_POST['details']);
$user_id = $_SESSION['id'];
$created_at = date('m-d-Y h:i:s a',time());
if (empty($name)||empty($email)||empty($subject)||empty($detail)){
   $error = "لا يمكنك ارسال رسالة ، تأكد أن جميع الحقول ممتلئة";
}else{
   
      $query = "insert into contacts (name, email, subject , details) 
      values('$name','$email','$subject' , '$detail' ) ";
      if(mysqli_query($conn, $query)){
          $message = "تم ارسال الرسالة بنجاح";
      }
      else{
          $error = "يوجد خلل في ارسال الرسالة  ".mysqli_error($conn);
      }
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
                            إرسال رسالة                           
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
               <div class="col-lg-10 col-md-5 col-sm-12 col-xs-12">
                  <div class="col-md-12">
                     <form action="#" method="post" enctype="multipart/form-data">
                        <h2>ارسال رسالة</h2>
                        <div class="name">
                           <input type="text" name="name" placeholder="الاسم" required> 
                        </div>
                        <div class="name">
                           <input type="text" name="subject" placeholder="العنوان" required> 
                        </div>
                        <br>
                        <div class="name">
                        <input type="text" name="email" placeholder="البريد الالكتروني" required> 
                        </div>
                        <br>
                        <br>
                        <div class="name">
                           <textarea type="text" name="details" placeholder="اكتب رسالتك" required> </textarea>
                        </div>
                        <br>
                        <div class="submit">
                           <button class="form-submit" name="submit">إرسال الرسالة</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
<?php
include ('footer.php');
?>