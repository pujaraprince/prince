
	<?php
	include_once('header.php');
	?>
    <!--  Main wrapper -->
    
      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Add Categories</h5>
              <div class="card">
                <div class="card-body">
                  <form action="" method="post" enctype="multipart/form-data" onsubmit="return validation55(this)">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Categorie Name</label>
                      <input type="name" name="cate_name" id="cname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="" placeholder="Enter Categorie Name">
                      
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Description</label>
                      <textarea cols="80" rows="5" id="cdesc" name="cate_description" class="form-control" value="address"></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Category Image</label>
                      <input type="file"  name="cate_image" id="photo2" class="form-control" onChange="return check(this)">
                    </div>
                  
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Add Categories</button>
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