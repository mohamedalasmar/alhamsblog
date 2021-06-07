<?php
session_start();
if(!$_SESSION['id']){
    header('location:login.php');
}
include('head.php');
include('nav.php');

if($_GET){
   $message = '';
   $error = '';
   $id = htmlspecialchars($_GET['id']);
   
   $query = " delete from contacts where id = $id ";
   
   if(mysqli_query($conn, $query)){
    $message = "تم حذف الرسالة بنجاح"; 
   }else{
    $error = 'لم يتم الحذف بنجاح '. mysqli_error($conn);
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
                أهلًا بك <?php echo $_SESSION['name'];?> 
             </h2>
             <ul class="list-inline list-unstyled header-links wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.25s; animation-name: fadeInUp;">
                <li>
                   <a style="color: white !important;" href="/">
                   الرئيسية 
                   </a>
                </li>
                <li>
                   <span>
                   رسائل الزوار
                   </span>
                </li>
             </ul>
          </div>
       </div>
    </div>
 </div>
</section>
<section id="about" class="explain section-padding">
 <div class="container">
    <div class="row">
        <?php 
         include('side.php');
         if(!empty($message)){
         echo "<p style='color: green; padding:10px; background-color: #b1f69f'>$message</p>";
         }
         if(!empty($error)){
         echo "<p style='color: red; padding:10px; background-color: #f6a69f'>$error</p>";
         }
        ?>
       <div class="col-lg-10 col-md-5 col-sm-12 col-xs-12">
          <div class="col-md-12">
             <div class="table-responsive">
                <table class="table table-hover table-striped">
                   <thead>
                      <tr>
                         <th class="text-center">#</th>
                         <th class="text-center">الاسم</th>
                         <th class="text-center">البريد الالكتروني</th>
                         <th class="text-center">الموضوع</th>
                         <th class="text-center">التفاصيل</th>
                         <th class="text-center" width="10%"></th>
                      </tr>
                   </thead>
                   <tbody>
                       <?php 
                       $query = "select * from contacts";
                       $result = mysqli_query($conn, $query);
                       if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                             echo '<tr>
                         <td class="text-center">
                            <span class="btn btn-bold btn-font  btn-label-info">
                            '.$row["id"].'
                            </span>
                         </td>
                         <td class="text-center">
                            <span class="btn btn-bold btn-font  btn-label-info">
                            '.$row["name"].'
                            </span>
                         </td>
                         <td class="text-center">
                            <span class="btn btn-bold btn-font  btn-label-info">
                            '.$row["email"].'
                            </span>
                         </td>
                         <td class="text-center">
                         <span class="btn btn-bold btn-font  btn-label-info">
                         '.$row["subject"].'
                         </span>
                      </td>
                      <td class="text-center">
                      <span class="btn btn-bold btn-font  btn-label-info">
                      '.$row["details"].'
                      </span>
                   </td>
                       
                         <td class="fitwidth">
                                    <div class="kt-widget2__actions">
                                       <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="false">
                                       المزيد
                                       </a>
                                       <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(39px, 39px, 0px);">
                                          <ul class="kt-nav">
                     
                                             <li class="kt-nav__item">
                                                <a style="color: black;" href= " message.php?id='.$row["id"].'">
                                                <i class="kt-nav__link-icon fa fa-trash"></i>
                                                <span class="kt-nav__link-text">حذف</span>
                                                </a>
                                             </li>
                     
                                          </ul>
                                       </div>
                                    </div>
                                 </td>
                      </tr>
                      ';
                                               }
                       }else{
                           echo "<tr><td>لا يوجد بيانات لعرضها</td></tr>";
                       } 
                       ?>
                    </tbody>
                </table>
                <div class="text-center">
                   <div class="ls-button-group demo-btn ls-table-pagination">
                      <div class="pagination-container">
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
</section>
<?php
include('footer.php');
?>