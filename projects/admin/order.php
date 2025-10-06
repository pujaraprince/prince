<?php
	include_once('header.php');
	?>   
   
   <div class="body-wrapper-inner">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Manage Orders</h5><br>
             
			  
			  <table id="myjtable" class="table table-striped myth">
				<thead>
				  <tr>
					<th class="myth">#ID</th>
					<th class="myth">Cus_id</th>
					<th class="myth">Serv_id</th>
				    <th class="myth">Quantity</th>
					<th class="myth">Origin</th>
					<th class="myth">Country</th>
					<th class="myth">Order_date</th>
					<th class="text-center myth">Action</th>
				  </tr>
				</thead>
				<tbody>
				  <?php
				foreach($order_arr as $data)
				{
				?>

				  <tr>
					<td><?php echo $data->id;?></td>
					<td><?php echo $data->cust_name;?></td>
					<td><?php echo $data->ser_name;?></td>
					<td><?php echo $data->quantity;?></td>
					<td><?php echo $data->origin;?></td>
					<td><?php echo $data->country;?></td>
					<td><?php echo $data->order_date;?></td>
					<td  class="text-center">
						
						<a href="delete?dtl_order=<?php echo $data->id;?>" class="btn btn-danger">Delete</a>
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