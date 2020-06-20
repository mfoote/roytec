<?php
    include('../../Database/dbconnect.php');
    include('../../Templates/Header.php');

    $workOrder =  $_GET['WorkOrder'];
    $partNumber = $_GET['partNumber'];
    $qty = $_GET['Qty'];
	$quotedTime =  $_GET['QuotedTime'];

	getTableData($workOrder);
	if($stmt->rowCount() >= 1)
	foreach($stmt as $row)
	{
		$lastTime = $row['finishedTime'];
		$partCount = $row['partcount'];
		$quotedTime = $row['quotedTime'];
	}
	
	echo $partCount;
    echo('<link href="../../Styles/TimeCircles.css" rel="stylesheet">');
    echo('<link href="../../Styles/Styles.css" rel="stylesheet">');
    echo('<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.js"></script>');
    echo('<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>');
    echo('<script type="text/javascript" src="../../JS/TimeCircles.js"></script>');

?>
<body>
<!--creates left hand table -->

<div class='row'>
			<div class = 'col-lg-3'>
				<table class='table table-bordered'>
						<tr>
							<th><h3>Work Order</h3></th>
								<tr>
									<td id='workorder'><a href='#'><h4><?=$workOrder?></h4></a></td>
								</tr>
						</tr>
						<tr>
							<th><h3>Part Number</h3></th>
								<tr>
									<td id='partNumber'><h4><a href="#"><?=$partNumber?></a></h4></td>
								</tr>
						</tr>
						<tr>
							<th><h3>Quantity</h3></th>
								<tr>
									<td id='qty'><h4><?=$qty?></h4></td>
								</tr>
						</tr>
						<tr>
							<th><h3>Quoted Time</h3></th>
								<tr>
									<td id='quotedtime'><h4><?=$quotedTime?></h4></td>
								</tr>
                        </tr>
                        <tr>
							<th><h3>Parts Completed</h3></th>
								<tr>
									<td id='completedParts'><h4><?php echo $partCount ?></h4></td>
								</tr>
						</tr>
				</table>
			</div>
			<!--end left hand table-->
			
			<!-- countdown clock-->
				<div class = 'col-lg-6'>
					<div class=' w-100 h-100 row vertical-center-row' >
						<div id='countdown' data-timer="<?php if(!empty($lastTime)){ echo($lastTime); }else{ $quotedTime*3600;}; ?>" ></div>
					</div>
			    </div>
			<!-- end countdown clock-->
			
		    <!--Start And Stop Buttons-->
			
			<div class='col-lg-2 align-self-center float-left'>
					
					<button class='btn btn-success btn-xl' id='start'>Start</button>
                    <button class='btn btn-danger btn-xl' id='stop'>Stop</button>
                    <button class='btn btn-primary btn-xl' id='countParts'>count</button>
				</div>

<!--end Start And Stop Buttons-->
<script type='text/javascript' src='../../JS/finalcountdown.js'></script>

<div id='ack' style="display:none;">
	<h3> Enter ID </h3> 
	<form id='formlogin'><input type='text' id='empID'> 
		<button type='submit' id='submit' class='btn btn-primary'>Submit</button>
	</form>
</div>

</body>