<?php
	include_once('header.php');
	?>   
   
   <div class="body-wrapper-inner">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Manage Feedbacks</h5>
             
			  
			  <table id="myjtable" class="table table-striped myth">
				<thead>
				  <tr>
					<th class="myth">#ID</th>
					<th class="myth">Cust_id </th>
					<th class="myth">Ser_id</th>
					<th class="myth">Fed_comment</th>
					<th class="myth">Fed_date</th>
					<th class="text-center myth">Action</th>
				  </tr>
				</thead>
				<tbody>
				  <?php
				foreach($feed_arr as $data)
				{
				?>

				  <tr>
					<td><?php echo $data->id;?></td>
					<td><?php echo $data->cust_name;?></td>
					<td><?php echo $data->ser_name;?></td>
					<td><?php echo $data->fed_comment;?></td>
					<td><?php echo $data->fed_date;?></td>
					<td  class="text-center">
					
						<a href="delete?dtl_feedback=<?php echo $data->id;?>" class="btn btn-danger">Delete</a>
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