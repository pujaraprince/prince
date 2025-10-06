<?php
	include_once('header.php');
	?>
	
    <!--  Main wrapper -->
   
      
	  
      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Services</h5>
              <p class="mb-0">Manage Services </p><br>
			  
			  <table id="myjtable" class="table table-striped myth" >
				<thead>
				  <tr >
					<th class="myth">#ID</th>
					<th class="myth">Categorie</th>
					<th class="myth">service </th>
					<th class="myth">Price</th>
					<th class="myth">Description</th>
					<th class="myth">Image</th>
					<th class="text-center myth">Action</th>
				  </tr>
				</thead>
				<tbody>
				 <?php
				foreach($prod_arr as $data)
				{
				?>

				  <tr>
					<td><?php echo $data->id;?></td>
					<td><?php echo $data->cate_name;?></td>
					<td><?php echo $data->ser_name;?></td>
					<td><?php echo $data->price;?></td>
					<td><?php echo $data->description;?></td>
					<td><img src="assets/images/products/<?php echo $data->image;?>" width="100px" alt=""></td>
					<td  class="text-center" style="width:171px">
						<a href="edit_service?edit_service=<?php echo $data->id;?>" class="btn btn-primary">Edit</a>
						<a href="delete?dtl_service=<?php echo $data->id;?>" class="btn btn-danger">Delete</a>
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