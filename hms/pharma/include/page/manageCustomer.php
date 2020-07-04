
<!--
	Filename			:	manageCustomer.php
	Description			:	Module responsible for managing customer.
	Author				:	B P likith Sai
-->

<?php
	session_start();
	include('../../include/config.php');
	include('../../include/checklogin.php');
	$default_image = "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"
?>

<div class="wrap-content container" id="container">
	<div class="container-fluid container-fullw bg-white">	

		<div class="row">
			<div class="col-md-12">
				<div class="row col-md-12 margin-top-10">
				
				<?php

						// pagination 
						$limit = 10;
						if(isset($_GET["pn"])) {
							$pn = $_GET["pn"];
						} else {
							$pn = 1;
						}

						$start = ($pn - 1) * $limit;

						$sql=mysqli_query($con,"SELECT * FROM tblpharmacustomer LIMIT $start, $limit");
						$cnt=1;


						while($row=mysqli_fetch_array($sql)) {
				?>

					
					<div class="panel-group mt-2 mb-0">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h4 class="panel-title" data-toggle="collapse" href="#collapse<?php echo $cnt;?>">
								<div class="row">	
									<img class="col-xs-3 col-sm-2 col-lg-1 img-circle border border-secondary" src="data:image/jpg;charset=utf8;base64,<?php if (!empty($row['customer_image'])) { echo base64_encode($row['customer_image']); } else { echo $default_image; } ?>" width="30" height="30"></img>
									<div class="col-xs-3 col-sm-7 col-lg-8">
										<b><?php echo $row['customer_name'];?></b>
										<br /><small><?php echo $row['customer_email'];?></small>
									</div>
									<div class="col-xs-6 col-sm-3 col-lg-3 text-center">
										<div class="text-center" style="list-style: none; display: flex;">
											<a href="#" class="col-md-6 btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> &nbsp; Edit</a>
											&nbsp;<a href="#" class="col-md-6 btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i> &nbsp; Remove</a>
										</div>
									</div>
								</div>
							</h4>
						</div>
							
						<div id="collapse<?php echo $cnt; ?>" class="panel-collapse collapse">
							<div class="panel-body p-0">	  
								<ul class="list-group mb-0">
								  <li class="list-group-item">
									<b><u style="color: #000;">Customer Address: </u></b>
									<p><?php echo $row['customer_address']; ?></p>
								  </li>
								  <li class="list-group-item">
									<b><u style="color: #000;">Customer Phone: </u></b>
									<p><?php echo $row['customer_phone']; ?></p>
								  </li>
								</ul>
							</div>
						</div>
					</div>
						
					<?php $cnt=$cnt+1; }?>
				</div>
						
					

				<?php
					$count=mysqli_query($con,"SELECT COUNT(*) FROM tblpharmacustomer");
					$row = mysqli_fetch_array($count);   
        			$total_records = $row[0];  
				
					// Number of pages required. 
					$total_pages = ceil($total_records / $limit);   
					$pagLink = "";                         

					if( $total_records >= $limit) {
						echo "<div class=\"text-right\"><ul class=\"pagination\">";
							for ($i = 1; $i <= $total_pages; $i++) { 
								if($i == $pn) {
									echo "<li class='active'><a href='dashboard.php?page=manageCustomer&pn=" . $i . "'>" . $i . "</a></li>";
								} else {
									echo "<li><a href='dashboard.php?page=manageCustomer&pn=" . $i . "'>" . $i . "</a></li>";
								}	
							}
						echo "</ul></div>";
					}
				?>
			</div>
		</div>
	</div>
</div>


