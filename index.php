<?php 
session_start();
include('head.php');
include('nav.php');
?>     
<header id="home" class="header-home">
         <div class="container">
            <div class="content-height row">
               <div class="content-height col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="content">
                     <div class="header-text">
                        <h2 style='color: white;'>الهمص للتكنولوجيا المعلومات والتدريب</h2>
                        <p>
						شركة الهمص للتكنولوجيا المعلومات والتدريب  تقدم منظومة متكاملة من الخدمات ويهتم بتنمية قدرات الشباب بوجه خاص, معتمدة من وزارة التربية والتعليم والعديد من الجهات الاخرى ، مجهز بكافة الوسائل الت
						دريبية اللازمة وذلك لتنفيذ كافة الدورات المهنية والحرفية والتقنية والإدارية ودورات التنمية البشرية.
						</p>
                     </div>
                     <div class="button"> <a class="form-submit" href="#services">خدماتنا</a> </div>
                  </div>
               </div>
               <div class="mock-header col-lg-6 col-md-6 col-sm-8 col-xs-12">
                  <div class="mock"> <img src="img/background/mock-header-rtl.png" alt=""> </div>
               </div>
            </div>
         </div>
         <div class="header-elment">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 1080" style="enable-background:new 0 0 1920 1080;" xml:space="preserve">
               
               <style type="text/css">
                .st0 {
                  fill: #FFFFFF;
                  }
               </style>
               <path class="st0" d="M0,516.42L0,1080h1920V333l-142.25,449.44c-47.14,148.92-206.08,231.44-355,184.3L0,516.42z" />
            </svg>
         </div>
      </header>
      <section id="services" class="pricing section-padding">
         <div class="container">
            <div class="title">
               <h2>خدماتنا</h2>
               <p>كاستجابة للتطور الهائل في استخدام تقنية المعلومات في جميع الجوانب؛ ونهج السوق العالمي لتطوير العمل في المنظمات والقطاعات والمكاتب المختلفة وللحاجة المتزايدة في الأسواق المحلية والدولية؛ نقدم لك العديد من الخدمات.</p>
            </div>
            <div class="row">
                <?php 
                $query = "select * from blogs where category_id = 1";
                $result = mysqli_query($conn, $query);
                
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '
               <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="item-pricing free">
                     <div class="item-icon"> <span><img style="width: 100px; height: 100px; border-radius: 50px;" src= img/'.$row['img'].'></span> </div>
                     <div class="price">
                        <h4>'.$row['subject'].'</h4>
                     </div>
                     <div class="options">
                        <ul>
                           <li>
                              <p>'.substr($row['details'],0,100).'</p>
                           </li>
                       </ul>
                     </div>
                 </div>
               </div>';
                }
                }
                ?>
            </div>
         </div>
      </section>
      <section id="news" class="blog section-padding">
         <div class="container">
            <div class="title">
               <h2>آخر الأخبار</h2>
               <p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص.</p>
            </div>
            <div class="row">
               <div class="blog-items clearfix">
                    <?php 
                $query = "select * from blogs where category_id = 2";
                $result = mysqli_query($conn, $query);
                
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                       $cat_name =  mysqli_fetch_assoc(mysqli_query($conn,"select name from categories where id = ".$row['category_id']))['name']; 
                        
                        echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                     <div class="blog-item">
                        <div class="blog-img-3">
                        <img style="width: 360px; height: 250px;" src="img/'.$row["img"].'">
                        </div>
                        <div class="blog-text technology">
                           <div class="text-up">
                              <p>'.explode(' ',$row["created_at"])[0].'</p>
                              <span class="technology">'.$cat_name.'</span> 
                           </div>
                           <div class="text-title">
                              <h3>'.$row["subject"].'</h3>
                              <p>'.substr($row["details"],0,70).'</p>
                           </div>
                           <div class="blog-link"> <a class="technology" href="blog-details.php?id='.$row["id"].'">اقرأ أكثر</a> </div>
                        </div>
                     </div>
                  </div>
              ';
                    }}
                    ?>
               </div>
            </div>
         </div>
      </section>
      <section id="about" class="explain section-padding">
         <div class="container">
            <div class="title">
               <h2>من نحن</h2>
               <p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص.</p>
            </div>
            <div class="row">
               <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                  <div class="mock-section"> <img style="margin-top:-50px;" src="img/background/contact.gif" alt="mock"> </div>
               </div>
               <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                  <div id="general" class="accordion">
                     <ul class="accordion-list accordion-drop">
                          <?php 
                $query = "select * from blogs where category_id = 3";
                $result = mysqli_query($conn, $query);
                
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<li class="default">
                           <div class="drop-title">
                              <p>'.$row['subject'].'</p>
                              <span class="icon-holder"> <span class="icon"></span> </span>
                           </div>
                           <ul class="menu-text">
                              <li>
                              '.$row['details'].'
                              </li>
                           </ul>
                        </li>';
                    }
                }?>
                  </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section id="contact" class="download section-padding">
         <div class="container">
            <div class="row">
               <div class="mock-float col-lg-5 col-md-5 col-sm-12 col-xs-12">
                  <div class="mock-section mock-float"> <img src="img/background/home-img.png" alt="mock"> </div>
               </div>
               <div class="col-lg-7 col-md-7 col-sm-12">
                  <div class="">
                     <form action="#">
                        <h2 style="color: white;">تواصل معنا</h2>
                        <div class="name">
                           <input type="text" name="name" placeholder="اسم المستخدم" > 
                        </div>
                        <br>
                        <div class="email">
                           <input type="email" name="email" placeholder="الايميل"> 
                        </div>
                        <br>
                        <div class="name">
                           <input type="text" name="name" placeholder="الموضوع"> 
                        </div>
                        <br>
                        <div class="name">
                           <textarea type="text" name="name" placeholder="الرسالة"> </textarea>
                        </div>
                        <br>
                        <div class="submit">
                           <button class="form-submit" name="submit">إرسال</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="subscribe section-padding">
         <div class="container">
            <div class="title">
               <h2>اشترك للحصول على المزيد من الميزات</h2>
               <p>اشترك بالقائمة البريدية ليصلك كل جديد</p>
            </div>
            <div class="row">
               <div class="subscribe-content">
                  <div class="col-lg-5 col-md-5 col-sm-8 col-xs-12">
                     <form action="#">
                        <div class="email">
                           <input type="email" name="email" placeholder="عنوان بريدك الإلكتروني">
                           <button type="submit"><i class="fas fa-chevron-left" aria-hidden="true"></i></button>
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