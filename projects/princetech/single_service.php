<?php
  
	include_once('header.php');
	
  ?>


  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index">Home</a></li>
            <li class="current"><?php  echo$fetch->ser_name?></li>
          </ol>
        </nav>
        
      </div>
    </div><!-- End Page Title -->

      <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?php  echo$fetch->ser_name?></h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
         <div  class="row justify-content-center ">
          <div class="col-lg-5">

         <img  src="../admin/assets/images/products/<?php echo $fetch->image?>" width="400" height="350" alt="">
          </div>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
           <div class="section-heading">
           
         
			  <p class="mt-2"><?php  echo $fetch->description?></p><br>
		  	 
			  
        <h4>Price :$<?php echo $fetch->price;?></h4><br>
		   	
        <div class="justify-content-center  ">
            <a href="edit-profile?edit_customer=<?php echo $fetch->id?>" class="read-more"><span>Buy Now</span><i class="bi bi-arrow-right"></i></a>
</div>
          </div>
              </div>
        </div>

      </div>

    </section><!-- /About Section -->

    

       


   <?php
  include_once('footer.php');
  ?>