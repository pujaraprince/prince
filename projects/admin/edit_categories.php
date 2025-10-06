
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
                  <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Categorie Name</label>
                      <input type="name" name="cate_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $fetch->cate_name;?>" >
                      
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Description</label>
                      <textarea cols="80" rows="5" name="cate_description" class="form-control" ><?php echo $fetch->cate_description;?></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Category Image</label>
                      <input type="file"  name="cate_image" class="form-control" ><br>
                      <img src="assets/images/categories/<?php echo $fetch->cate_image?>" style="width:100px" alt="">
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