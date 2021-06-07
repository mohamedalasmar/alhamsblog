<nav class="navbar navbar-default navbar-fixed-top">
         <div class="container">
            <div class="navbar-header">
               <div class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false" role="button">
                  <div class="menu-icon">
                     <div class="toggle-bar "></div>
                  </div>
               </div>
               <div class="logo"> <img class="navbar-brand" src="img/logo/logo.png" alt="logo"> </div>
            </div>
            <div class="collapse navbar-collapse" id="menu" data-hover="dropdown" data-animations="fadeInUp">
			  <br>
			  <ul class="nav navbar-nav navbar-right">
                  <li><a class="click-close" href="index.php#home">الرئيسية</a></li>
                  <li><a class="click-close" href="index.php#services">خدماتنا</a></li>
                  <li><a class="click-close" href="index.php#news">الأخبار</a></li>
                  <li><a class="click-close" href="index.php#about">من نحن</a></li>
                  <li><a class="click-close" href="index.php#contact">تواصل معنا</a></li>
                  <?php
                  if(isset($_SESSION['id'])){
                  echo '
                  <li><a class="click-close" href="blogs.php">صفحتي</a></li>
                  <li><a class="click-close sign-up" href="logout.php">خروج</a></li>
                  ';
                  }else{
                  echo '<li><a class="click-close sign-up" href="login.php">دخول</a></li>';    
                  }
                      ?>
               </ul>
            </div>
         </div>
      </nav>