
	<?php
	include_once('header.php');
	?>
    <!--  Main wrapper -->
    
      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Edit Contacts</h5>
              <div class="card">
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Name</label>
                      <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $fetch->name;?>">
                      
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $fetch->email;?>">
                      
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Project</label>
                      <input type="text" name="project" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $fetch->project;?>">
                      
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Mobile Number</label>
                      <input type="numer" name="mobile" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $fetch->mobile;?>">
                      
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Message</label>
                      <textarea cols="80" rows="5" name="message" class="form-control" ><?php echo $fetch->message;?></textarea>
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