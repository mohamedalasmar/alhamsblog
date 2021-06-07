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
    $cat = htmlspecialchars($_POST['cat']);
    $user_id = $_SESSION['id'];
    
    if(empty($cat) > 0){
        $error = "خلل في اضافة التصنيف";
    }else{
        $query = "insert into categories (name, user_id) 
        values('$cat', $user_id)";
        
        if(mysqli_query($conn, $query)){
            $message = "تم إضافة التصنيف بنجاح";
        }else{
            $error = "خلل في اضافة التصنيف  ".mysqli_error($conn);
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
                           إضافة تصنيف
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
                        <h2 style="text-align:center;">إضافة تصنيف</h2>
                        <div class="name">
                           <input type="text" name="cat" placeholder="اسم التصنيف المراد اضافته" required> 
                        </div>
                        <br>
                        <div class="submit" style="text-align:center;">
                           <button class="form-submit" name="submit">إضافة تصنيف</button>
                        </div>
                        </div>
                        </div>
                        </div>
        </div>

        </form>
        </section>

<?php
include('footer.php')
?>