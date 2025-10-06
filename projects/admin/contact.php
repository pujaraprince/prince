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
              <h5 class="card-title fw-semibold mb-4">Contact</h5>
              <p class="mb-0">Manage Contact </p><br>
			  
			  <table id="myjtable" class="table table-striped myth">
				<thead>
				  <tr>
					<th class="myth">#ID</th>
					<th class="myth">Name</th>
					<th class="myth" >Project</th>
					<th class="myth">Email</th>
					<th class="myth">Mobile</th>
					<th class="myth">Message</th>
					<th class="text-center myth">Action</th>
				  </tr>
				</thead>
				<tbody>
				  <?php
				foreach($cont_arr as $data)
				{
				?>

				  <tr>
					<td><?php echo $data->id;?></td>
					<td><?php echo $data->name;?></td>
					<td><?php echo $data->project;?></td>
					<td><?php echo $data->email;?></td>
					<td><?php echo $data->mobile;?></td>
					<td><?php echo $data->message;?></td>
					<td  class="text-center" style="width:171px">
						<a href="edit_contact?edit_contact=<?php echo $data->id;?>" class="btn btn-primary">Edit</a>
						<a href="delete?dtl_contact=<?php echo $data->id;?>" class="btn btn-danger">Delete</a>
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