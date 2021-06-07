<?php 
session_start();
include('head.php');
include('nav.php');
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
              تفاصيل المدونة <?php if(!empty($row['subject'])) echo $row['subject']; ?>  
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
        <h3><?php if(!empty($row['subject'])) echo $row['subject']; ?></h3>
        <div class="text-up"> <p><?php if(!empty($row['created_at'])) echo $row['created_at'].'<br><br>'; ?></p>
        <div>
        <img style="width: 100%; height: 400px;" src="<?php if(!empty($row['img'])) echo 'img/'.$row['img']; ?>">
        </div>
        </div><div class="text-second"> <p style="text-align: justify;">
        <?php if(!empty($row['details'])) echo $row['details']; ?></p></div>
       <div class="bloog-footer clearfix"><div class="share clearfix"> <ul> <li>التصنيف:</li><li><a href="#">
           <?php if(!empty($row['category_id']))
     echo  mysqli_fetch_assoc(mysqli_query($conn,"select name from categories where id = ".$row['category_id']))['name'];         
           ?>
           
           </a></li></ul> </div></div></div></div>
     </div>
 </div>
</section>

<?php 
include('footer.php');
?>  