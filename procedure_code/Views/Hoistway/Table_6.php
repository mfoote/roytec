
<?php 
    include('../../Database/dbconnect.php');
    include('../../Templates/Header.php');
    include('../../Functions/functions.php');

    Hoistway_Table(6);
?>

<body>
    <table class="table responsive-table table-striped table-center" id="draggable">
        <thead class="thead-dark">
            <tr class='center-align'>
                <th>Contract</th>
                <th>Parts Left</th>
                <th>Start</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($results as $row): ?>
                <tr>
                    <td id='workOrder'><?=$row['CONTRACT#'];?></td>
                    <td id='count'><?=$row['Count'];?></td>
                    <td><button id='cycleCounter' class='btn btn-success'>Start</button></td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <form type="hidden" id="formAction" action="parts.php" method="POST">
        <input type="hidden" name="WorkOrder">
        <input type="hidden" name="table">
        <input type="hidden" name="area">
    </form>
    <script src='../../JS/hoistwaypartcycle.js'></script>
</body>