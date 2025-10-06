
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
                  <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Service Name</label>
                      <input type="name" name="ser_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $fetch->ser_name;?>">
                    
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label" >Description</label>
                      <textarea cols="80" rows="5" name="description" class="form-control" ><?php echo $fetch->description;?></textarea>
                    </div>
                    <div class="mb-3" >
                       <label for="price" class="form-label">Price</label><br>
                       <input type="number" class="form-control" name="price" id="price" value="<?php echo $fetch->price;?>" >
                    </div>

                    <div class="mb-3" >
                       <label for="image" class="form-label">Upload Image</label><br>
                       <input type="file" name="image" class="form-control"><br>
					    <img src="assets/images/products/<?php echo $fetch->image?>" style="width:100px" alt="">
                    </div>

                   <div class="mb-3">
                    <label for="eSelect" class="form-label">Select a catrgorie</label>
                    <select class="form-select" name="cate_id" id="exampleSelect" aria-label="Default select example" value="" >
                      <option ><?php  echo $cate_arr1?> Select a catrgorie</optidion>
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
                    <button type="submit" name="submit" class="btn btn-primary">save</button>
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