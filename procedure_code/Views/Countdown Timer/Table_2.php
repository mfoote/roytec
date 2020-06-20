<?php
	include('../../Database/dbconnect.php');
	include('../../Functions/functions.php');
	echo('<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.js"></script>');
    echo('<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>');
    echo('<script type="text/javascript" src="../../JS/TimeCircles.js"></script>');
	include('../../Templates/Bootstrap_Header.php');
	
	echo('<link href="../../Styles/TimeCircles.css" rel="stylesheet">');
    echo('<link href="../../Styles/Styles.css" rel="stylesheet">');

    $workOrder =  $_GET['WorkOrder'];
    $partNumber = $_GET['partNumber'];
    $qty = $_GET['Qty'];
	$QuotedTime =  $_GET['QuotedTime'];

	getTableData($workOrder);

	foreach($results as $row)
	{
		$quotedTime = $row['Timelaps'];
		$numberofparts = $row['Partcount'];
	}


?>
<body>
<title>Countdown</title>
<!--start left hand table-->
<div class='row'>
	<div class='col-lg-3'>
		<table class='table table-bordered'>
			<tr>
				<th><h3>Work Order</h3></th>
			</tr>
			<tr>
				<td id='workorder'><a href='#'><h3><?=$workOrder?></h3></a></td>
			</tr>
			<tr>
				<th><h3>Part Number</h3></th>
			</tr>
			<tr>
				<td id='partNumber'><h3><a href="#"><?=$partNumber?></a></h3></td>
			</tr>
			<tr>
				<th><h3>Quantity</h3></th>
			</tr>
			<tr>
				<td id='qty'><h3><?=$qty?></h3></td>
			</tr>
			<tr>
				<th><h3>Quoted Time</h3></th>
			</tr>
			<tr>
				<td id='quotedtime'><h3><?=convertTime($QuotedTime) ?></h3></td>
			</tr>
            <tr>
				<th><h3>Parts Completed</h3></th>
			</tr>
			<tr>
				<td id='completedParts'><h3><?=(isset($numberofparts) ? $numberofparts : '0'); ?></h3></td>
			</tr>
		</table>
	</div>

<!--end left hand table-->
			
<!-- countdown clock-->
	<div class = 'col-lg-6'>
		<div class='w-100 h-100 row vertical-center-row'>
			<div id='countdown' data-timer="<?= (isset($quotedTime) && $quotedTime !== NULL ? $quotedTime : $QuotedTime * 3600); ?>" ></div>
		</div>
	</div>
<!-- end countdown clock-->
			
<!--Start And Stop Buttons-->

	<table style="visibility:hidden;">
		<tr>
			<td><button class='btn btn-success btn-xl' id='startfake'>Start</button></td>
		</tr>
		<tr>
			<td><button class='btn btn-success btn-xl' id='startfake'>Start</button></td>
		</tr>
		<tr>
			<td><button class='btn btn-success btn-xl' id='startfake'>Start</button></td>
		</tr>
	</table>
	<div class="col-lg-3 h-100">
		<div class='w-100 h-100'>
			<button class='btn btn-success btn-xl' id='start'>Start</button>
			<button class='btn btn-danger btn-xl' id='stop'>Stop </button>
			<button class='btn btn-primary btn-xl' id='countParts'>count</button>
		</div>
	</div>
</div>

<!--end Start And Stop Buttons-->
<div id='ack' style="display:none;">
	<h3> Enter ID </h3> 
	<form id='formlogin'><input type='text' id='empID'> 
		<button type='submit' id='submit' class='btn btn-primary'>Submit</button>
	</form>
</div>
<script type='text/javascript' src='../../JS/finalcountdown.js'></script>
</body>

