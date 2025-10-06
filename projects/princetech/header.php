<?php
  // Determine current path/file
  $current_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  $current_file = basename($current_path ?: 'index.php');

  // Treat "", "/", and "index.php" as home
  $is_home = ($current_file === '' || $current_file === '/' || $current_file === 'index.php');

  // Body class controls the transparent header rule `.index-page .header`
  $body_class = $is_home ? 'index-page' : 'inner-page';

  // Header classes: transparent on home, solid on inner pages
  $header_class = 'header d-flex align-items-center ' . ($is_home
                  ? 'fixed-top header-transparent'
                  : 'sticky-top');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>princetech</title>

  <meta name="description" content="">
  <meta name="keywords" content="">
  <style>
    .profile-dropdown {
  position: relative;
  display: inline-block;
}

.profile-btn {
  background: none;
  border: none;
  cursor: pointer;
  padding: 0;
}

.profile-avatar {
  width: 36px;
  height: 36px;
  border-radius: 50%;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #fff;
  min-width: 220px;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
  border-radius: 10px;
  z-index: 1;
  overflow: hidden;
}

.profile-info {
  display: flex;
  align-items: center;
  padding: 12px;
  justify-content: space-around;
}


.profile-avatar-lg {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  justify-content: space-around;
  
}

.profile-name {
  font-weight: 600;
  font-size: 16px;
}

.dropdown-content a {
  color: #000000ff;
  padding: 10px 16px;
  display: block;
  text-decoration: none;
  font-size: 14px;
}

.dropdown-content a:hover {
  background-color: #f0f0f0;
}

hr {
  margin: 0;
  border: none;
  border-top: 1px solid #eee;
}

    </style>
    <script>
      function toggleDropdown() {
  const dropdown = document.getElementById("dropdown-menu");
  dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
}

window.onclick = function (event) {
  if (!event.target.closest(".profile-dropdown")) {
    document.getElementById("dropdown-menu").style.display = "none";
  }
};

      </script>

  <!-- Favicons 
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
-->
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <script src="../admin/assets/js/val.js"></script>

  <!-- =======================================================
  * Template Name: Arsha
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Updated: Feb 22 2025 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  



<script>
    var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?17879';
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.async = true;
    s.src = url;
    var options = {
  "enabled":true,
  "chatButtonSetting":{
      "backgroundColor":"#4dc247",
      "ctaText":"",
      "borderRadius":"25",
      "marginLeft":"0",
      "marginBottom":"50",
      "marginRight":"50",
      "position":"right"
  },
  "brandSetting":{
      "brandName":"Princetech",
      "brandSubTitle":"Hi welcome to Princetech",
      "brandImg":"https://cdn.clare.ai/wati/images/WATI_logo_square_2.png",
      "welcomeText":"Hi, there!\nHow can I help you?",
      "messageText":"Hello, I have a question about Princetech services",
      "backgroundColor":"#0a5f54",
      "ctaText":"Start Chat",
      "borderRadius":"25",
      "autoShow":false,
      "phoneNumber":"8082647586"
  }
};
    s.onload = function() {
        CreateWhatsappChatWidget(options);
    };
    var x = document.getElementsByTagName('script')[0];
    x.parentNode.insertBefore(s, x);
</script>
</head>
</head>

<body class="<?php echo $body_class; ?>">
  <header id="header" class="<?php echo $header_class; ?>">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">princetech</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index" class="<?php echo $is_home ? 'active' : ''; ?>">Home</a></li>
          <li><a href="about-us" class="<?php echo ($current_file === 'aboutus.php') ? 'active' : ''; ?>">About</a></li>
          <li><a href="service" class="<?php echo ($current_file === 'services.php') ? 'active' : ''; ?>">Services</a></li>
          <li><a href="portfolio" class="<?php echo ($current_file === 'portfolio.php') ? 'active' : ''; ?>">Portfolio</a></li>
          <li><a href="blog" class="<?php echo ($current_file === 'blog.php') ? 'active' : ''; ?>">Blog</a></li>
          <li><a href="contact" class="<?php echo ($current_file === 'contact.php') ? 'active' : ''; ?>">Contact</a></li>
           <?php
           if (isset($_SESSION['u_id'])) {
           ?>
           <li class="dropdown"><a href="#"><span>
            <?php echo "Hi .." .$_SESSION['u_name']?></span> <i class="bi bi-chevron-down toggle-dropdown"></i>
          </a>
     
            <ul>
               <div style="display:flex; justify-content:space-around"><img src="assets/img/customers/person-m-7.webp" style="padding:5px;width:65px;height:65px;" class="profile-avatar-lg"  alt="User Avatar" /></div>
               <hr>
               <li><a href="user-profile">My Profile</a></li>
              <li><a href="#">My Order</a></li>
              <li><a href="user_logout">Logout</a></li>
       </ul>


        <?php
        } else {
        ?>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

       <a class="btn-getstarted" href="login">Login</a>
       <?php
         }
         ?>
    </div>
  </header>
