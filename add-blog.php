<?php 
session_start();

if(!$_SESSION['id']){
    header("Location: login.php");
}
include('head.php');
include('nav.php');
if($_POST){
    $error = '';
    $message = '';
    $subject = htmlspecialchars($_POST['subject']);
    $category_id = htmlspecialchars($_POST['category_id']);
    $details = htmlspecialchars($_POST['details']);
    $user_id = $_SESSION['id'];
    $created_at = date('m-d-Y h:i:s a',time());
    
    if(empty($subject) ||empty($category_id) || empty($details) || $_FILES['img']['error'] > 0){
        $error = "حقول العنوان والتصنيف والتفاصيل مطلوبة أو هناك خلل في رفع الملف";
    }else{
        move_uploaded_file($_FILES['img']['tmp_name'], 'img/'.$_FILES['img']['name']);
        $img = $_FILES['img']['name'];
        $query = "insert into blogs (subject, details, user_id , category_id, created_at, img) 
        values('$subject','$details',$user_id , $category_id, '$created_at','$img')";
        
        if(mysqli_query($conn, $query)){
            $message = "تم إضافة المدونة بنجاح";
        }else{
            $error = "لم يتم إضافة المدونة  ".mysqli_error($conn);
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
                        أهلًا بك <?php echo $_SESSION['name']; echo "<br>";
                        ?> 
                     </h2>
                     <ul class="list-inline list-unstyled header-links wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-name: fadeInUp;">
                        <li>
                           <a style="color: white !important;" href="/">
                           الرئيسية / 
                           </a>
                        </li>
                        <li>
                           <span>
                           إضافة مدونة
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
                        <h2>إضافة مدونة</h2>
                        <div class="name">
                           <input type="text" name="subject" placeholder="العنوان" required> 
                        </div>
                        <br>
                        <div class="name">
                           <select name="category_id" required class="mystyle">
                              <option>اختر نوع المدونة</option>
                        
                              <?php 
                               $query = "select * from categories";
                               $result = mysqli_query($conn, $query);
                               if(mysqli_num_rows($result) > 0){
                                   while($r = mysqli_fetch_assoc($result)){
                                       echo "<option value=".$r['id'].">".$r['name']."</option>";
                                   }
                               }
                               ?>
                           </select>
                        </div>
                        <br>
                        <div class="name">
                           <input type="file" name="img" placeholder="الصورة" required class="mystyle" title='اختر الصورة' accept="image/*"> 
                        </div>
                        <br>
                        <div class="name">
                           <textarea type="text" name="details" placeholder="التفاصيل" required> </textarea>
                        </div>
                        <br>
                        <div class="submit">
                           <button class="form-submit" name="submit">حفظ</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
<?php 
include('footer.php');
?>