<?php
	include_once('header.php');
	?>
	
    <!--  Main wrapper -->
  
      
	   <?php
	  include_once('admin_account.php')
	  ?>
      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Customer</h5>
              <p class="mb-0">Manage Customer </p><br>
			  
			  <table id="myjtable" class="table table-striped myth">
				<thead>
				  <tr>
					<th class="myth">#ID</th>
					<th class="myth">Name</th>
					<th class="myth">Email</th>
					<th class="myth">Mobile</th>
					<th class="myth">Address</th>
					<th class="myth">Pincode</th>
					<th class="text-center myth">Action</th>
				  </tr>
				</thead>
				<tbody>
				  <?php
				foreach($cust_arr as $data)
				{
				?>

				  <tr>
					<td><?php echo $data->id;?></td>
					<td><?php echo $data->cust_name;?></td>
					<td><?php echo $data->email;?></td>
					
					<td><?php echo $data->mob;?></td>
					<td><?php echo $data->address;?></td>
					<td><?php echo $data->pincode;?></td>
					<td  class="text-center" style="width:265px;">
						<a href="status?status_customer=<?php echo $data->id;?>" class="btn btn-primary"><?php echo $data->status;?></a>
						<a href="edit_customer?edit_customer=<?php echo $data->id;?>" class="btn btn-primary">Edit</a>
						<a href="delete?dtl_customer=<?php echo $data->id;?>" class="btn btn-danger">Delete</a>
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