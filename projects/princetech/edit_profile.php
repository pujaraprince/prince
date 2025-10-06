<?php
  
  if(isset($_SESSION['u_id']))
{
  
}

else{
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
            <li class="current">Edit Profile</li>
          </ol>
        </nav>
        <h1>Edit Profile</h1>
      </div>
    </div><!-- End Page Title -->

    <!-- Contact Start -->
        <div class="container-fluid py-3 mt-3">
            <div class="container py-3">
                <div class="text-center mx-auto pb-3 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                
                    <h1 class="mb-3">Edit Profile</h1>
                    
                </div>
                <div class="position-relative p-5">
                    
                    <div class="row g-3">
                     
                        <div style = "border: 0.5px solid rgb(158, 158, 158); border-radius: 3px;;" class="offset-lg-3 col-lg-6 wow fadeIn" data-wow-delay=".5s">
                            <form  method="post" enctype="multipart/form-data">
                            <div class="p-5 rounded contact-form">
                                <div class="mb-4">
                                    <input type="text" name="cust_name" class="form-control border-1 py-3" value="<?php echo $fetch->cust_name;?>">
                                </div>
                                <div class="mb-4">
                                    <input type="email" name="email" class="form-control border-1 py-3" value="<?php echo $fetch->email;?>">
                                </div>
                                
                                <div class="mb-4">
                                    <input type="number" name="mob" class="form-control border-1 py-3" value="<?php echo $fetch->mob;?>">
                                </div>
                                 <div class="mb-4">
                                    <textarea name="address" class="w-100 form-control border-1 py-3" rows="6" cols="10" ><?php echo $fetch->address;?></textarea>
                                </div>
                                <div class="mb-4">
                                    <input type="mumber" name="pincode" class="form-control border-1 py-3" value="<?php echo $fetch->pincode;?>">
                                </div>

                                <div class="mb-4">
                                  
                                    <input type="file" name="image" class="form-control border-1 py-3" >
                                    <img src="assets/img/customers/<?php echo $fetch->image?>" style="width:100px" alt="">
                                    
                                </div>
                               
                                <div class="text-start">
                                    <button type="submit" name="save"  class="btn bg-primary text-white py-3 px-5" type="button">Save</button>
									<br><br>
									
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