<?php
  if(isset($_SESSION['u_id']))
	{
		
	}
	else
	{
		echo "<script>
			window.location='index';
		</script>";
	}	
	include_once('header.php');
	
  ?>


  <main class="main">
  <style>
     
   .profile-card {
    background: #fff;
    width: 480px;
    border-radius: 15px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    overflow: hidden;
    margin-bottom:100px;
    

  }

  .profile-header {
    background-color: #3d4d6a;
    padding: 2rem;
    color: #fff;
    text-align: center;
    position: relative;
  }

  .profile-header img {
    width: 130px;
    height: 130px;
    border-radius: 50%;
    border: 5px solid #fff;
    object-fit: cover;
    box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
  }

  .profile-header h2 {
    margin: 1rem 0 0.3rem;
    font-size: 1.8rem;
    font-weight: 700;
  }

  .profile-header p {
    font-size: 1rem;
    opacity: 0.85;
  }

  .profile-body {
    padding: 2rem;
    color: #333;
  }

  .user-info {
    margin: 1rem 0;
  }

  .user-info label {
    font-weight: 700;
    color: #555;
    display: block;
    margin-bottom: 0.3rem;
    font-size: 0.9rem;
  }

  .user-info span {
    font-size: 1.1rem;
    color: #3f3f3fff;
  }

  .edit-btn {
    margin-top: 2rem;
    display: inline-block;
    background: #ffffffff;
    color: black;
    padding: 0.7rem 1.8rem;
    font-weight: 600;
    border: 1px solid #0056b3;
    border-radius: 8px;
    cursor: pointer;
    text-decoration: none;
    transition: background 0.3s ease;
    box-shadow: 0 5px 15px rgba(0,123,255,0.4);
  }

  .edit-btn:hover {
    background: #3d4d6a;
    color:white;
  }
    </style>
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index">Home</a></li>
            <li class="current">User Profile</li>
          </ol>
        </nav>
        <h1>User Profile</h1>
      </div>
    </div><!-- End Page Title -->

   
<div style="display:flex; justify-content:center; margin-top:100px;">

    <div class="profile-card">
  <div class="profile-header">
    <img src="assets/img/customers/<?php echo $fetch->image?>" alt="Pujara Prince Profile Picture" />
    <h2 style="color:white;">Hello.. <?php echo $_SESSION['u_name'];?></h2>
    <p>Your Personal Profile Dashboard</p>
  </div>

      <div class="profile-body">
    <div class="user-info">
      <label>Name</label>
      <span ><?php echo $fetch->cust_name?></span>
    </div>
    <div class="user-info">
      <label>Email</label>
      <span><?php echo $fetch->email?></span>
    </div>
    <div class="user-info">
      <label>Mobile</label>
      <span><?php echo $fetch->mob?></span>
    </div>
    <div class="user-info">
      <label>Address</label>
      <span><?php echo $fetch->address?></span>
    </div>
    <div class="user-info">
      <label>Pincode</label>
      <span><?php echo $fetch->pincode?></span>
    </div>
    <a href="edit-profile?edit_customer=<?php echo $fetch->id?>" class="edit-btn">Edit Profile &rarr;</a>
  </div>
</div>

    
</div>
       


   <?php
  include_once('footer.php');
  ?>