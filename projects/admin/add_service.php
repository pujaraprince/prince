
	<?php
	include_once('header.php');
	?>
    <!--  Main wrapper -->
    
      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Add Service</h5>
              <div class="card">
                <div class="card-body">
                  <form action="" method="post" enctype="multipart/form-data" onsubmit="return validation35(this)">
                    <div class="mb-3">
                      <label for="" class="form-label">Service Name</label>
                      <input type="text" name="ser_name" id="sename" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Service Name">
                    
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Description</label>
                      <textarea cols="80" rows="5" id="desc" name="description" class="form-control" value="address"></textarea>
                    </div>
                    <div class="mb-3" >
                       <label for="price" class="form-label">Price</label><br>
                       <input type="number" id="sprice" class="form-control" name="price" id="price"  >
                    </div>

                    <div class="mb-3" >
                       <label for="image" class="form-label">Upload Image</label><br>
                       <input type="file" name="image" id="photo1" class="form-control" onChange="return check(this)">
                    </div>
                    
                   <div class="mb-3">
                    <label for="eSelect" class="form-label">Select a catrgorie</label>
                    <select class="form-select" name="cate_id" id="select" aria-label="Default select example" >
                      <option value="">select a categorie</option>
                      <?php
                          foreach($cate_arr as $data)
                          {
                          ?>
                         <option value="<?php echo $data->id?>"><?php echo $data->cate_name?></option>
                         <?php
                          }
                         ?>
  </select>
</div>
                      
	
	<br>
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Add Service</button>
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