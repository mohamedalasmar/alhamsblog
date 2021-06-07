<?php 
session_start();

if(!$_SESSION['id']){
    header("Location: login.php");
}
include('head.php');
include('nav.php');

if($_POST){
   // print_r ($_POST);
    $error = '';
    $message = '';
    
    $subject = htmlspecialchars($_POST['subject']);
    $category_id = htmlspecialchars($_POST['category_id']);
    $details = htmlspecialchars($_POST['details']);
    $user_id = $_SESSION['id'];
    
    $id = htmlspecialchars($_GET['id']);
    
    if(empty($subject) ||empty($category_id) || empty($details)){
        $error = "حقول العنوان والتصنيف والتفاصيل مطلوبة ";
    }else{
        if($_FILES['img']['name']){
        move_uploaded_file($_FILES['img']['tmp_name'], 'img/'.$_FILES['img']['name']);
        $img = $_FILES['img']['name']; 
        
        $query = "update blogs set subject = '$subject', details = '$details', user_id = $user_id, category_id = $category_id, img = '$img' where id = $id";    
        }else{
           $query = "update blogs set subject = '$subject', details = '$details', user_id = $user_id, category_id = $category_id where id = $id";    
        }
       if(mysqli_query($conn, $query)){
            $message = "تم تعديل المدونة بنجاح";
        }else{
            $error = "لم يتم تعديل المدونة  ".mysqli_error($conn);
        }
    }
}

if($_GET){
    $id = htmlspecialchars($_GET['id']);
    
    $query = "select * from blogs where id = $id";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
    }else{
        header("Location: 404.php");
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
                           تعديل مدونة
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
                        <h2>تعديل مدونة</h2>
                        <div class="name">
                           <input type="text" name="subject" placeholder="العنوان" required value="<?php if(isset($row['subject'])) echo $row['subject'];?>"> 
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
                                   $r['id'] == $row['category_id'] ? $s = "selected": $s=""; 
                                   echo "<option $s value=".$r['id'].">".$r['name']."</option>";
                                   }
                               }
                               ?>
                           </select>
                        </div>
                        <br>
                        <div class="name">
                           <input type="file" name="img" placeholder="الصورة" class="mystyle" title='اختر الصورة' accept="image/*"> 
                            <img style="width: 70px; height: 70px;" src="<?php if(isset($row['img'])) echo 'img/'.$row['img'];?>">
                        </div>
                        <br>
                        <div class="name">
                           <textarea type="text" name="details" placeholder="التفاصيل" required>
                           <?php if(isset($row['details'])) echo $row['details'];?>
                           </textarea>
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