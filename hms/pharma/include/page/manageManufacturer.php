
<!--
	Filename			:	manageManufacturer.php
	Description			:	Module responsible for managing medicine manufacturers.
	Author				:	B P likith Sai
-->

<?php
	session_start();
	include('../../include/config.php');
	include('../../include/checklogin.php');
?>

<div class="wrap-content container" id="container">
	<div class="container-fluid container-fullw bg-white">
		<div class="row">
			<div class="col-md-12">
				<p style="color:red;">
					<?php echo htmlentities($_SESSION['msg']);?>
					<?php echo htmlentities($_SESSION['msg']="");?>
				</p>	
					
					<?php

						// pagination 
						$limit = 10;
						if(isset($_GET["pn"])) {
							$pn = $_GET["pn"];
						} else {
							$pn = 1;
						}

						$start = ($pn - 1) * $limit;

						$sql=mysqli_query($con,"SELECT * FROM tblpharmamanufacturer LIMIT $start, $limit");
						$cnt=1;


						while($row=mysqli_fetch_array($sql)) {
					?>

					<div class="panel-group mt-2 mb-0">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<h4 class="panel-title" data-toggle="collapse" href="#collapse<?php echo $cnt;?>">
								<div class="row">
									<div class="col-xs-3 col-sm-9 col-lg-9">
										<b><?php echo $row['manufacturer_name']; ?></b>
										<br /><small><u>Phone</u> : <?php echo $row['manufacturer_mobile']; ?></small>
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
									<b><u style="color: #000;">Manufacturer address: </u></b>
									<p><?php echo $row['manufacturer_address']; ?></p>
								  </li>
								  <li class="list-group-item">
									<b><u style="color: #000;">Manufacturer Mobile: </u></b>
									<p><?php echo $row['manufacturer_mobile']; ?></p>
								  </li>
								</ul>
							</div>
						</div>
					</div>
										
					<?php 
						$cnt=$cnt+1; 
					}
					
					$count=mysqli_query($con,"SELECT COUNT(*) FROM tblpharmamanufacturer");
					$row = mysqli_fetch_array($count);   
        			$total_records = $row[0];  
				
					// Number of pages required. 
					$total_pages = ceil($total_records / $limit);   
					$pagLink = "";                         

					if( $total_records >= $limit) {
						echo "<div class=\"text-right\"><ul class=\"pagination\">";
							for ($i = 1; $i <= $total_pages; $i++) { 
								if($i == $pn) {
									echo "<li class='active'><a href='dashboard.php?page=manageManufacturer&pn=" . $i . "'>" . $i . "</a></li>";
								} else {
									echo "<li><a href='dashboard.php?page=manageManufacturer&pn=" . $i . "'>" . $i . "</a></li>";
								}	
							}
						echo "</ul></div>";
					}
				?>
			</div>
		</div>
	</div>
</div>