<!DOCTYPE html>
<?php
	include('../../Database/dbconnect.php');
	include('../../Functions/functions.php');
	echo('<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.js"></script>');
    echo('<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>');
    echo('<script type="text/javascript" src="../../JS/TimeCircles.js"></script>');
	include('../../Templates/Bootstrap_Header.php');
	echo('<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>');
	echo('<script type="text/javascript" src="../../JS/ez.countimer.min.js"></script>');
	
	echo('<link href="../../Styles/TimeCircles.css" rel="stylesheet">');
	echo('<link href="../../Styles/Styles.css" rel="stylesheet">');
	echo('<link href="../../Styles/Countdown.css" rel="stylesheet">');
	echo('<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>');
	echo('<script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>');

	//<a href="../Drawings/WorkOrder.php?WorkOrder=<?=$partNumber" target="_blank">


    $workOrder =  $_POST['WorkOrder'];
    $partNumber = $_POST['partNumber'];
    $qty = $_POST['Qty'];
	$QuotedTime =  $_POST['QuotedTime'];
	$area = $_POST['area'];

	getTableData($workOrder,$area);

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
	<div class='col-sm-3'>
		<table class='table table-bordered'>
	
			<tr>
				<th><h4>Work Order</h4></th>
			</tr>
			<tr>
				<td id='workorder'><a href='#'><h4><?=$workOrder?></h4></a></td>
			</tr>
			<tr>
				<th><h4>Part Number</h4></th>
			</tr>
			<tr>
				<td id='partNumber'><h4><?=$partNumber?></a></h4></td>
			</tr>
			<tr>
				<th><h4>Quantity</h4></th>
			</tr>
			<tr>
				<td id='qty'><h4><?=$qty?></h4></td>
			</tr>
			<tr>
				<th><h4>Quoted Time</h4></th>
			</tr>
			<tr>
				<td id='quotedtime'><h4><?=convertTime($QuotedTime) ?></h4></td>
			</tr>
            <tr>
				<th><h4>Parts Completed</h4></th>
			</tr>
			<tr>
				<td id='completedParts'><h4><?=(isset($numberofparts) ? $numberofparts : '0'); ?></h4></td>
			</tr>
			<tr>
				<td id="MaterialVerified" class=""><h4></h4></td>
			</tr>
			<input type="hidden" id="area" value="<?=$area?>">
		</table>
	</div>

<!--end left hand table-->
			
<!-- countdown clock-->
	<div class = 'col-sm-6'>
		<div class=''>
			<div id='countdown' data-timer="<?= (isset($quotedTime) && $quotedTime !== NULL ? $quotedTime : $QuotedTime * 3600+1); ?>" ></div>
		</div>
	</div>
<!-- end countdown clock-->
			
<!--Start And Stop Buttons-->

	<div class="col-sm-3 h-100 center">
			<button class='btn btn-success btn-xl' id='start'>Start</button>
			<button class='btn btn-danger btn-xl' id='stop'>Stop </button>
			<button class='btn btn-primary btn-xl' id='countParts'>count</button>
			<button class='btn btn-warning btn-xl' id='downtime'>Downtime</button>

	</div>

<!--end Start And Stop Buttons-->
<div id='ack' style="display:none;">
	<h3> Enter ID </h3> 
	<form id='formlogin'><input type='text' id='empID'> 
		<button type='submit' id='submit' class='btn btn-primary'>Submit</button>
	</form>
</div>

<div id='downtimemessage' style="display:none;">
	<h3>Downtime</h3> 
	<div id='downtimeCounter' class='display-4'></div>
	<button class='btn btn-primary' id='FinishDowntime'>Finish</button> 
</div>

<div id='workorderdata' style='display:none;'>
	<table class="table" id="verificationTable">
		<thead>
			<th>Raw Material</th>
			<th>Description</th>
			<th>Amount</th>
			<th>Verify</th>
		</thead>
		<tbody class="" id="getData">
		</tbody>
	</table>
	<div>
		<button class='btn btn-primary' id="verification">Submit</button>
	</div>
</div>

<div id='stopReason' style='display:none;'>
	<div class="form-group">
		<h3>Please Select a reason for stopping</h3>
		<form>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="downtime" id="downtime">
				<label class="form-check-label" for="downtime"><h3>Downtime</h3></label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value ="bathroom" id="bathroom">
				<label class="form-check-label" for="bathroom"><h3>Bathroom</h3></label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value ="break" id="Break">
				<label class="form-check-label" for="Break"><h3>Break</h3></label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value ="break" id="endOfDay">
				<label class="form-check-label" for="endOfDay"><h3>End of Shift</h3></label>
			</div>
		</form>
</div>

<script type='text/javascript' src='../../JS/camera.js'></script>
<script type='text/javascript' src='../../JS/finalcountdown.js'></script>
<script type='text/javascript' src='../../JS/workorder.js'></script>
</body>
</html>

