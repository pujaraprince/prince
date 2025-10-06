<?php
	include_once('header.php');
	?>
	
    <!--  Main wrapper -->
    
      
	   
      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Categories</h5>
              <p class="mb-0">Manage Categories </p><br>
			  
			  <table id="myjtable" class="table table-striped myth">
				<thead>
				  <tr>
					<th class="myth">#ID</th>
					<th class="myth" style="width:135px;">Categories Name</th>
					<th class="myth">Description</th>
					<th class="myth">Images</th>
					<th class="text-center myth">Action</th>
				  </tr>
				</thead>
				<tbody>

				<?php
				foreach($cate_arr as $data)
				{
				?>

				  <tr>
					<td><?php echo $data->id;?></td>
					<td><?php echo $data->cate_name;?></td>
					<td><?php echo $data->cate_description;?></td>
					<td><img src="assets/images/categories/<?php echo $data->cate_image;?>" width="100px" alt=""></td>
					<td  class="text-center" style="width:171px">
						<a href="edit_categories?edit_cate=<?php echo $data->id;?>" class="btn btn-primary">Edit</a>
						<a href="delete?dtl_category=<?php echo $data->id;?>" class="btn btn-danger">Delete</a>
					</td>
				  </tr>
				<?php
				}
				?>  
				</tbody>
			  </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
	include_once('footer.php');
	?> 