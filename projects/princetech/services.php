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
            <li class="current">Services Page</li>
          </ol>
        </nav>
        <h1>Services Page</h1>
      </div>
    </div><!-- End Page Title -->

         <!-- Services Section -->
    <section id="services" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Categories</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
        <?php
				foreach($cate_arr as $data)
				{
       
				?>
          <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon"><img src="../admin/assets/images/categories/<?php echo $data->cate_image;?>" width="280" height="120" alt=""></div>
              <h4><a href="" class="stretched-link"><?php echo $data->cate_name;?></a></h4>
              <p><?php echo $data->cate_description;?></p>
            </div>
          </div><!-- End Service Item -->
        <?php
				}
				?>
          

        </div>

      </div>

    </section><!-- /Services Section -->

     <!-- Pricing Section -->
    <section id="pricing" class="pricing section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">
       
        <div class="row gy-4">
           <?php
				foreach($ser_arr as $data)
				{
       
				?>

          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="pricing-item featured">
              <a href="view_service?view_service=<?php echo $data->id;?>"><h3><?php echo $data->ser_name;?></h3></a>
              <div class="icon"><a href="view_service?view_service=<?php echo $data->id;?>" ><img  src="../admin/assets/images/products/<?php echo $data->image;?>"
               width="270" height="150" alt=""></a></div><br>
              <h4><sup>$</sup><?php echo $data->price;?></h4>
              <p>
                <?php echo $data->description;?>
                </p>
              <a href="view_service?view_service=<?php echo $data->id;?>" class="buy-btn" >View More</a>
            </div>
          </div>

           <?php
				}
				?>
        

        </div>

      </div>

    </section><!-- /Pricing Section -->
  </main>

  <?php
  include_once('footer.php');
  ?>