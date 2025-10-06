
	<?php
	include_once('header.php');
	?>
    <!--  Main wrapper -->
    
      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Edit customer</h5>
              <div class="card">
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Name</label>
                      <input type="name" name="cust_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $fetch->cust_name?>">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $fetch->email?>">
                    
                    </div>
                    <div class="mb-3" >
                       <label for="price" class="form-label">Mobile Number</label><br>
                       <input type="number" class="form-control" name="mob" id="price" value="<?php echo $fetch->mob?>"  >
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Address</label>
                      <textarea cols="80" rows="5" name="address" class="form-control" ><?php echo $fetch->address?></textarea>
                    </div>
                    
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Pincode</label>
                      <input type="name" name="pincode" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $fetch->pincode?>">
                    
                    </div>
                    <div class="mb-3" >
                       <label for="image" class="form-label">Upload Image</label><br>
                       <input type="file" name="image" class="form-control"><br>
                       <img src="../princetech/assets/img/customers/<?php echo $fetch->image?>" style="width:100px" alt="">
                    </div>
     
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                  </form>
                </div>
              </div>
        
            </div>
          </div>
        </div>
      </div>
    </div>


<?php
	include_once('footer.php');
	?> 