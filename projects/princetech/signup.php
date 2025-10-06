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
            <li class="current">Signup Page</li>
          </ol>
        </nav>
        <h1>Signup Page</h1>
      </div>
    </div><!-- End Page Title -->

    <!-- Contact Start -->
        <div class="container-fluid py-3 mt-3">
            <div class="container py-3">
                <div class="text-center mx-auto pb-3 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                
                    <h1 class="mb-3">Signup Here</h1>
                    
                </div>
                <div class="position-relative p-5">
                    
                    <div class="row g-3">
                     
                        <div style = "border: 0.5px solid rgb(158, 158, 158); border-radius: 3px;;" class="offset-lg-3 col-lg-6 wow fadeIn" data-wow-delay=".5s">
                            <form  action="" method="post" enctype="multipart/form-data" onsubmit="return validation4(this)">
                            <div class="p-5 rounded contact-form">
                                <div class="mb-4">
                                    <input type="text" name="cust_name" id="sname" class="form-control border-1 py-3" placeholder="Your Name">
                                </div>
                                <div class="mb-4">
                                    <input type="text" name="email" id="semail" class="form-control border-1 py-3" placeholder="Your Email">
                                </div>
                                <div class="mb-4">
                                    <input type="password" name="password" id="spass" class="form-control border-1 py-3" placeholder="Your Password">
                                </div>
                                <div class="mb-4">
                                    <input type="number" name="mob" id="smobile" class="form-control border-1 py-3" placeholder="Mobile Number">
                                </div>
                                 <div class="mb-4">
                                    <textarea name="address" id="address" class="w-100 form-control border-1 py-3" rows="6" cols="10" placeholder="Address"></textarea>
                                </div>
                                <div class="mb-4">
                                    <input type="number" name="pincode" id="pincode" class="form-control border-1 py-3" placeholder="Pincode">
                                </div>
                               <div class="mb-4">
                                    <input type="file" id="photo" name="image" class="form-control border-1 py-3" onChange="return check(this)" >
                                </div>
                                <div class="text-start">
                                    <button type="submit" id="submit" name="submit" class="btn bg-primary text-white py-3 px-5" type="button">Signup</button>
									<br><br>
									<p><a href="login">If you Already Registered then login Here</a></p>
                                </div>
                            </div>
                              </form>
                        </div>
                  
                    </div>
                </div>
            </div> 
        </div>
        <!-- Contact End -->

  </main>

   <?php
  include_once('footer.php');
  ?>