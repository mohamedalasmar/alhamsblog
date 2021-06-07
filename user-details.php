<?php 
session_start();
include('head.php');
include('nav.php');
if($_GET){
    $id = htmlspecialchars($_GET['id']);
    $query = "select * from users where id = $id";
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
              تفاصيل المستخدم <?php if(!empty($row['name'])) echo $row['name']; ?>  
              </h2>
          </div>
       </div>
    </div>
 </div>
</section>
<section id="about" class="explain section-padding">
 <div class="container">
    <div class="row">
    <div class="single-blog-items"> <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12"> 
        <h3><?php if(!empty($row['name'])) echo $row['name']; ?></h3>
        </div><div class="text-second"> <p style="text-align: justify;">
        <?php if(!empty($row['email'])) echo $row['email']; ?></p></div>        
     </div></div></div></div>
     </div>
 </div>
</section>

<?php 
include('footer.php');
?>  