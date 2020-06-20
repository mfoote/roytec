<?php
    include_once('../../Templates/Header.php');
    $dbh = new PDO('odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};DBQ=\\\\RTCFS01\\Common\\Access Databases\\Personal\\Chris\\Chris.mdb;');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $dbh->prepare("SELECT * FROM COME_IN_GO_OUT WHERE [OPEN] <> 0 ORDER BY ScheduledDate ASC");
    $stmt->execute();


?>
<header>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../Styles/qualityStyle.css">
    <title>Quality Check</title>
</header>
<body>
    <table class="table table-responsive centered">
        <thead>
            <th>Work Order</th>
            <th>Part Number</th>
            <th>Quantity</th>
            <th>On-Hand Qty</th>
            <th>Quantity Not On Hand</th>
            <th>Scheduled Date</th>
        </thead>
        <?php foreach($stmt as $row) :?>
            <tr>
                <td><?=$row['WO_NO'];?></td>
                <td><?=$row['PARENT'];?></td>
                <td><?=$row['QTY'];?></td>
                <td><?=$row['ReceiptQuantity'];?></td>
                <td><?=$row['OPEN'];?></td>
                <td><?=$row['ScheduledDate'];?></td>
                <td><a class ="waves-effect waves-light btn" href="#">Quality Check</a></td>
            </tr>
        <?php endforeach;?>
    </table>

    <div style="display:none" id="PartCheck">
        <form>
            <div class="row">
                <div class="col m12 s12">
                    <h4>MORV</h4>
                </div>
            </div>
            <div class="row">
                <div class="col m6 s6">
                    <div class="input-field">
                        <input readonly id="workorder" type="text">
                        <label for="workorder" class="active">Work Order</label>
                    </div>
                </div>
                <div class="col m6 s6">
                    <div class="input-field">
                        <input readonly id="notOnHand" type="number">
                        <label for="notOnHand" class="active">Not On Hand</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col m12 s12">
                    <div class="input-field">
                        <input id="initials" type="text" maxlength="3"/>
                        <label for="initials">Enter Initials</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col m12 s12">
                    <div class="input-field">
                        <input id="quantity" type="number">
                        <label for="quantity">Enter Move Quantity</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col m12 s12">
                    <div class="input-field">
                        <select id="location">
                            <option>FG-01</option>
                            <option>FG-02</option>
                            <option>FG-01</option>
                            <option>FG-02</option>
                        </select>
                        <label>Move Location</label>
                    </div>
                </div>
            </div>
            <a href="#" class="waves-effect waves-light btn" id="submit">Submit</a>
        </form>
    </div>
    <script type='text/javascript' src='../../JS/Quality.js'></script>
</body>