<?php
  
if(isset($_SESSION['u_id']))
{
  echo "<script>
      window.location='index';
  </script>";
}

	include_once('header.php');
  
	
  ?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index">Home</a></li>
            <li class="current">login </li>
          </ol>
        </nav>
        <h1>Login here</h1>
      </div>
    </div><!-- End Page Title -->


    <!-- Contact Start -->
        <div class="container-fluid py-3 mt-5">
            <form action=""  method="post">
            <div class="container py-3">
                <div class="text-center mx-auto pb-3 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                   
                    <h1 class="mb-3">Login Page</h1>
                    
                </div>
                <div class="position-relative p-5">
                    
                    <div class="row g-5">
                     
                        <div class="offset-lg-3 col-lg-6 wow fadeIn" data-wow-delay=".5s">
                            <div style = "border: 0.5px solid rgb(158, 158, 158);"" class="p-5  rounded contact-form">
                              
                                <div class="mb-4 border 1">
                                    <input type="email" name="email" class="form-control border-0 py-3" placeholder="Your Email" required>
                                </div>
                                <div class="mb-4 border 1">
                                    <input type="password" name="password" class="form-control border-0 py-3 " placeholder="Your Password" required>
                                </div>
                               
                                <div class="text-start">
                                    <button type="submit" name="submit" class="btn bg-primary text-white py-3 px-5" type="button">Login</button>
                                  
                                    <br><br>
									<p><a href="signup">If you Not Registered then Signup Here</a></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div> 
             </form>
        </div>
        <!-- Contact End -->


  </main>

   <?php
  include_once('footer.php');
  ?>